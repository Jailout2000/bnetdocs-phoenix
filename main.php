<?php
  
  /**
   * main - defines the entrypoint for the project.
   */
  
  header('X-Frame-Options: DENY');
  header('X-Remote-Host: ' . $_SERVER['REMOTE_ADDR'] . ':' . $_SERVER['REMOTE_PORT']);
  
  /**
   * configure a simple error handler that returns a simple HTTP 500 error.
   */
  set_error_handler(function($iErrorNumber, $sErrorMessage, $sErrorFile, $iErrorLine, $oErrorContext){
    http_response_code(500);
    header('Content-Type: text/html;charset=utf-8');
    
    $sFullURL = BnetDocs::fGetCurrentFullURL();
    $sMethod = $_SERVER['REQUEST_METHOD'];
    $sTimestamp = date('F d Y H:i:s T');
    $sIPAddress = $_SERVER['REMOTE_ADDR'];
    
    $sUnencryptedData = json_encode(array(
      "errno" => $iErrorNumber,
      "errstr" => $sErrorMessage,
      "errfile" => $sErrorFile,
      "errline" => $iErrorLine,
      "errcontext_meta" => array(
        "gettype" => gettype($oErrorContext),
        "get_class" => (is_object($oErrorContext) ? get_class($oErrorContext) : false),
      ),
    ), JSON_PRETTY_PRINT);
    $sEncryptedKey = 'bnetdocs+dev$!'; // if you steal this, you're more than welcome to try and break the server ;)
    $sEncryptedData = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($sEncryptedKey), $sUnencryptedData, MCRYPT_MODE_CBC, md5(md5($sEncryptedKey))));
    //$sDecryptedData = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($sEncryptedKey), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($sEncryptedKey))), "\0");
    
    $sGitHubIssueTitle = 'Automatic Unhandled Error Report';
    $sGitHubIssueBody = "Hi,\n\nI just tried to access a page on BnetDocs, but unfortunately when the page loaded, the server told me an internal server error occurred.\n\nCollected Metadata:\n\n```\nURL: " . $sFullURL . "\nMethod: " . $sMethod . "\nTimestamp: " . $sTimestamp . "\nMy IP: " . $sIPAddress . " (you can omit this)\n```\n\nError Data:\n\n```\n" . $sEncryptedData . "\n```\n\nPlease investigate this issue asap so I can continue to use the website.\n\nThanks!\n";
    $sGitHubIssueURL = "https://github.com/Jailout2000/bnetdocs-phoenix/issues/new?" . http_build_query(array("title" => $sGitHubIssueTitle, "body" => $sGitHubIssueBody));
    
    echo "<!DOCTYPE html>\n";
    echo "<html>\n";
    echo "  <head>\n";
    echo "    <title>BnetDocs</title>\n";
    echo "    <meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />\n";
    echo "    <style type=\"text/css\">\n";
    echo "      body { background: #fafafa; color: #000; font: 11pt sans-serif; margin: 0; padding: 0; text-align: center; }\n";
    echo "      div { background: #eaeaea; border-radius: 16px; box-sizing: border-box; margin: 32px auto; padding: 4px 10px; width: 600px; }\n";
    echo "      p.s { font-size: 8pt; }\n";
    echo "    </style>\n";
    echo "  </head>\n";
    echo "  <body>\n";
    echo "    <div>\n";
    echo "      <h1>500 Internal Server Error</h1>\n";
    echo "      <p>An internal server error occurred while processing your request. This could indicate a more serious problem, so please <a href=\"" . $sGitHubIssueURL . "\" target=\"_blank\">report this</a>.</p>\n";
    echo "      <p class=\"s\">" . $sTimestamp . " &ndash; " . $sIPAddress . "</p>\n";
    echo "    </div>\n";
    echo "  </body>\n";
    echo "</html>\n";
    
    exit(1);
  }, E_ALL | E_STRICT);
  
  /**
   * this project uses code that is only available in PHP 5.4 (and possibly newer).
   * we give a warning instead of an error because the specific PHP 5.4 changes might not get ran.
   */
  if (PHP_VERSION < 5.4) {
    trigger_error('PHP version installed on this server is older than 5.4.', E_USER_WARNING);
  }
  
  /**
   * the default response code is '200 OK', and probably no care as to caching.
   * we want to return '500 Internal Server Error' and disable caching until we prove otherwise.
   */
  http_response_code(500);
  header('Cache-Control: max-age=0, must-revalidate, no-cache, no-store');
  
  global $_CONFIG;
  try {
    $_CONFIG = file_get_contents('config.json');
    $_CONFIG = json_decode($_CONFIG, true);
  } catch (Exception $error) {
    trigger_error('An unhandled ' . get_class($error) . ' error occurred while trying to read the global config.', E_USER_ERROR);
  }
  
  if (!isset($_CONFIG) || !is_array($_CONFIG)
      || !array_key_exists('database', $_CONFIG)
      || !array_key_exists('engine', $_CONFIG['database'])
      || !array_key_exists('hostname', $_CONFIG['database'])
      || !array_key_exists('username', $_CONFIG['database'])
      || !array_key_exists('password', $_CONFIG['database'])
      || !array_key_exists('name', $_CONFIG['database'])
      || !array_key_exists('connect_timeout', $_CONFIG['database'])
      || !array_key_exists('character_set', $_CONFIG['database'])
      || !array_key_exists('maintenance', $_CONFIG)
      || count($_CONFIG['maintenance']) != 2
      || !is_bool($_CONFIG['maintenance'][0])
      || !is_string($_CONFIG['maintenance'][1])
      || !array_key_exists('paths', $_CONFIG)
      || !array_key_exists('base_dir', $_CONFIG['paths'])
      || !array_key_exists('core_dir', $_CONFIG['paths'])
      || !array_key_exists('static_dir', $_CONFIG['paths'])
      || !array_key_exists('template_dir', $_CONFIG['paths'])
      || substr($_CONFIG['paths']['base_dir'], -1) != '/'
      || substr($_CONFIG['paths']['core_dir'], -1) != '/'
      || substr($_CONFIG['paths']['static_dir'], -1) != '/'
      || substr($_CONFIG['paths']['template_dir'], -1) != '/'
      ) trigger_error('The global config failed its verification check.', E_USER_ERROR);
  
  function __autoload($sClassName) {
    global $_CONFIG;
    require_once($_CONFIG['paths']['core_dir'] . $sClassName . '.php');
  }
  
  if (BnetDocs::fInitialize()) {
    BnetDocs::fExecute(new HTTPContext());
    BnetDocs::fFinalize();
  }
  