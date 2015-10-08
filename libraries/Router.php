<?php

namespace BNETDocs\Libraries;

use \BNETDocs\Controllers\Credits as CreditsController;
use \BNETDocs\Controllers\Document\Popular as DocumentPopularController;
use \BNETDocs\Controllers\Document\Search as DocumentSearchController;
use \BNETDocs\Controllers\Legal as LegalController;
use \BNETDocs\Controllers\Maintenance as MaintenanceController;
use \BNETDocs\Controllers\News as NewsController;
use \BNETDocs\Controllers\News\View as NewsViewController;
use \BNETDocs\Controllers\Packet\Popular as PacketPopularController;
use \BNETDocs\Controllers\Packet\Search as PacketSearchController;
use \BNETDocs\Controllers\Redirect as RedirectController;
use \BNETDocs\Controllers\Servers as ServersController;
use \BNETDocs\Controllers\Status as StatusController;
use \BNETDocs\Controllers\User\Login as UserLoginController;
use \BNETDocs\Controllers\User\Logout as UserLogoutController;
use \BNETDocs\Controllers\User\Register as UserRegisterController;
use \BNETDocs\Controllers\User\View as UserViewController;
use \BNETDocs\Libraries\Common;
use \BNETDocs\Libraries\Exceptions\ControllerNotFoundException;
use \DateTime;
use \DateTimeZone;
use \SplObjectStorage;
use \UnexpectedValueException;
use \http\Cookie;

class Router {

  protected $hostname;
  protected $requestMethod;
  protected $requestURI;
  protected $pathArray;
  protected $pathString;
  protected $queryArray;
  protected $queryString;
  protected $requestCookies;
  protected $requestBodyArray;
  protected $requestBodyString;
  protected $requestBodyMimeType;

  protected $responseCode;
  protected $responseHeaders;
  protected $responseCookies;
  protected $responseContent;

  public function __construct() {
    $this->hostname = getenv("HTTP_HOST");
    if (empty($this->hostname)) $this->hostname = getenv("SERVER_NAME");
    $this->requestMethod = getenv("REQUEST_METHOD");
    $this->requestURI = getenv("REQUEST_URI");
    $cursor = strpos($this->requestURI, "?");
    if ($cursor !== false) {
      $this->pathString = substr($this->requestURI, 0, $cursor);
      $this->queryString = substr($this->requestURI, $cursor + 1);
    } else {
      $this->pathString = $this->requestURI;
      $this->queryString = "";
    }
    $this->pathArray = explode("/", $this->pathString);
    parse_str($this->queryString, $this->queryArray);
    $this->requestCookies = new Cookie(getenv("HTTP_COOKIE"));
    $this->requestBodyMimeType = getenv("CONTENT_TYPE");
    $this->requestBodyString = $this->_getRequestBodyString();
    $this->requestBodyArray = $this->_getRequestBodyArray();
    $this->responseCode = 500;
    $this->responseHeaders = new SplObjectStorage();
    $this->responseCookies = new SplObjectStorage();
    $this->responseContent = "";
  }

  private function _getRequestBodyString() {
    $len = getenv("CONTENT_LENGTH");
    $buffer = "";
    if ($len === false) {
      $stdin = fopen("php://input", "rb");
      $buffer = stream_get_contents($stdin);
      fclose($stdin);
    } else {
      $len = (int) $len;
      $i = 0;
      $chunk_size = 8192; // default is 8192 according to PHP documentation
      $stdin = fopen("php://input", "r");
      while (!feof($stdin) && $i < $len) {
        $buffer .= fread($stdin, $chunk_size);
      }
      fclose($stdin);
    }
    return $buffer;
  }

  private function _getRequestBodyArray() {
    if (stripos($this->requestBodyMimeType, "application/json") !== false || stripos($this->requestBodyMimeType, "text/json") !== false) {
      return json_decode($this->requestBodyString);
    } else if (stripos($this->requestBodyMimeType, "application/x-www-form-urlencoded") !== false) {
      $buffer;
      parse_str($this->requestBodyString, $buffer);
      return $buffer;
    } else {
      return null;
    }
  }

  public function addResponseContent($buffer) {
    $this->responseContent .= $buffer;
  }

  public function getHostname() {
    return $this->hostname;
  }

  public function getRequestCookie($name) {
    return $this->requestCookies->getCookie($name);
  }

  public function getRequestCookies() {
    return $this->requestCookies;
  }

  public function getRequestHeader($name) {
    return getenv("HTTP_" . str_replace("-", "_", strtoupper($name)));
  }

  public function getRequestMethod() {
    return $this->requestMethod;
  }

  public function getRequestPathArray() {
    return $this->pathArray;
  }

  public function getRequestPathExtension() {
    return pathinfo($this->pathString, PATHINFO_EXTENSION);
  }

  public function getRequestPathString($with_extension = true) {
    if ($with_extension || strpos($this->pathString, ".") === false) {
      return $this->pathString;
    } else {
      return substr($this->pathString, 0, strrpos($this->pathString, "."));
    }
  }

  public function getRequestBodyArray() {
    return $this->requestBodyArray;
  }

  public function getRequestBodyString() {
    return $this->requestBodyString;
  }

  public function getRequestQueryArray() {
    return $this->queryArray;
  }

  public function getRequestQueryString() {
    return $this->queryString;
  }

  public function getRequestURI() {
    return $this->requestURI;
  }

  public function route(Pair &$redirect = null) {
    $pathArray = $this->getRequestPathArray();
    $path      = (isset($pathArray[1]) ? $pathArray[1] : null);
    $subpath   = (isset($pathArray[2]) ? $pathArray[2] : null);
    Logger::setTransactionName(
      $path . (isset($subpath) ? "/" . $subpath : "")
    );

    if (Common::checkIfBlizzard()) {
      Logger::logMetric("is_blizzard_visit", true);
      Logger::logEvent(
        "blizzard_visit",
        null, // TODO: Log their user_id here if applicable
        getenv("REMOTE_ADDR"),
        json_encode([
          "path" => $this->getRequestPathString(true)
        ])
      );
    } else {
      Logger::logMetric("is_blizzard_visit", false);
    }

    ob_start();

    if (Common::$config->bnetdocs->maintenance[0]) {
      $controller = new MaintenanceController(
        Common::$config->bnetdocs->maintenance[1]
      );
    } else if (isset($redirect)) {
      $controller = new RedirectController(
        $redirect->getKey(), $redirect->getValue()
      );
    } else {
      switch ($path) {
        case "":
          // Try to route legacy BNETDocs Redux paths to Phoenix paths with a
          // 301 Permanent redirect, otherwise go to the news with 302 Found.
          $query = $this->getRequestQueryArray();
          $op  = (isset($query["op"])  ? $query["op"]  : null);
          $did = (isset($query["did"]) ? $query["did"] : null);
          $nid = (isset($query["nid"]) ? $query["nid"] : null);
          $pid = (isset($query["pid"]) ? $query["pid"] : null);
          $url = null; $code = 301;
          if ($op == "doc" && !is_null($did)) {
            $url = "https://dev.bnetdocs.org/document/" . rawurlencode($did);
          } else if ($op == "news" && !is_null($nid)) {
            $url = "https://dev.bnetdocs.org/news/" . rawurlencode($nid);
          } else if ($op == "packet" && !is_null($pid)) {
            $url = "https://dev.bnetdocs.org/packet/" . rawurlencode($pid);
          } else if ($op == "credits") {
            $url = "https://dev.bnetdocs.org/credits";
          } else if ($op == "legalism") {
            $url = "https://dev.bnetdocs.org/legal";
          } else if ($op == "login") {
            $url = "https://dev.bnetdocs.org/user/login";
          } else if ($op == "news") {
            $url = "https://dev.bnetdocs.org/news";
          } else if ($op == "register") {
            $url = "https://dev.bnetdocs.org/user/register";
          /*} else if ($op == "resetpw") {
            $url = "https://dev.bnetdocs.org/user/resetpassword";*/
          }
          if (is_null($url)) {
            $url = "https://dev.bnetdocs.org/news";
            $code = 302;
          }
          $controller = new RedirectController($url, $code);
        break;
        case "credits": case "credits.htm": case "credits.html":
          $controller = new CreditsController();
        break;
        case "document":
          switch ($subpath) {
            case "search": case "search.htm": case "search.html":
              $controller = new DocumentSearchController();
            break;
            case "popular": case "popular.htm": case "popular.html":
              $controller = new DocumentPopularController();
            break;
            default:
              throw new ControllerNotFoundException($path . "/" . $subpath);
          }
        break;
        case "legal": case "legal.htm": case "legal.html": case "legal.txt":
          $controller = new LegalController();
        break;
        case "news.htm": case "news.html": case "news.rss":
          $controller = new NewsController();
        break;
        case "news":
          if (is_numeric($subpath)) {
            $controller = new NewsViewController($subpath);
          } else {
            $controller = new NewsController();
          }
        break;
        case "newsrss.php":
          // Legacy BNETDocs Redux to BNETDocs Phoenix redirect.
          $controller = new RedirectController(
            "https://dev.bnetdocs.org/news.rss", 301
          );
        break;
        case "packet":
          switch ($subpath) {
            case "search": case "search.htm": case "search.html":
              $controller = new PacketSearchController();
            break;
            case "popular": case "popular.htm": case "popular.html":
              $controller = new PacketPopularController();
            break;
            default:
              throw new ControllerNotFoundException($path . "/" . $subpath);
          }
        break;
        case "rss":
          // Old-style Phoenix to new-style Phoenix redirect.
          switch ($subpath) {
            case "news":
              $controller = new RedirectController(
                "https://dev.bnetdocs.org/news.rss", 301
              );
            break;
            default:
              throw new ControllerNotFoundException($path . "/" . $subpath);
          }
        break;
        case "servers": case "servers.htm": case "servers.html":
        case "servers.json":
          $controller = new ServersController();
        break;
        case "status": case "status.json": case "status.txt":
          $controller = new StatusController();
        break;
        case "user":
          switch ($subpath) {
            case "login": case "login.htm": case "login.html":
              $controller = new UserLoginController();
            break;
            case "logout": case "logout.htm": case "logout.html":
              $controller = new UserLogoutController();
            break;
            case "register": case "register.htm": case "register.html":
              $controller = new UserRegisterController();
            break;
            default:
              if (is_numeric($subpath)) {
                $controller = new UserViewController($subpath);
              } else {
                throw new ControllerNotFoundException($path . "/" . $subpath);
              }
          }
        break;
        default:
          throw new ControllerNotFoundException($path);
      }
    }

    // Prevent clickjacking globally:
    $this->setResponseHeader("X-Frame-Options", "DENY");

    $controller->run($this);
    $this->addResponseContent(ob_get_contents());

    ob_end_clean();
  }

  public function send() {
    http_response_code($this->responseCode);
    foreach ($this->responseHeaders as $header) {
      header($header->getName() . ": " . $header->getValue());
    }
    foreach ($this->responseCookies as $cookie) {
      header("Set-Cookie: " . $cookie->__toString());
    }
    echo $this->responseContent;
  }

  public function setResponseCode($code) {
    $this->responseCode = $code;
  }

  public function setResponseContent($buffer) {
    $this->responseContent = $buffer;
  }

  public function setResponseCookie($name, $value, $ttl, $httpOnly, $secure) {
    $flags = 0;
    if ($httpOnly) $flags |= Cookie::HTTPONLY;
    if ($secure)   $flags |= Cookie::SECURE;

    $cookie = new Cookie();
    $cookie->setCookie($name, $value);
    $cookie->setDomain(".bnetdocs.org");
    $cookie->setFlags($flags);
    $cookie->setMaxAge($ttl);
    $cookie->setPath("/");

    $this->responseCookies->attach($cookie);
  }

  public function setResponseHeader($arg1, $arg2 = null) {
    if ($arg1 instanceof HTTPHeader) {
      $this->responseHeaders->attach($arg1);
    } else if (is_string($arg1) && is_string($arg2)) {
      $this->responseHeaders->attach(new HTTPHeader($arg1, $arg2));
    } else {
      throw new UnexpectedValueException("Arguments given must be two strings or an HTTPHeader object", -1);
    }
  }

  public function setResponseTTL($ttl) {
    $ttl = (int) $ttl;
    if ($ttl < 0) {
      throw new UnexpectedValueException(
        "Argument must be equal to or greater than zero", -1
      );
    }
    $dtz = new DateTimeZone("GMT");
    if ($ttl > 0) {
      $expires = new DateTime("+" . $ttl . " second");
    } else {
      $expires = new DateTime("@0");
    }
    $expires->setTimezone($dtz);
    $this->setResponseHeader("Cache-Control", "max-age=" . $ttl);
    $this->setResponseHeader("Expires", $expires->format("D, d M Y H:i:s e"));
    $this->setResponseHeader("Pragma", "max-age=" . $ttl);
  }

}
