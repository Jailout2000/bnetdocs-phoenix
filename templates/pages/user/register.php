<?php
  
  $usr = new User(63);
  $stat = Email::fSendWelcome($usr);
  
  ob_start('ob_gzhandler');
  include('./includes/user/register.php');
  $sPage = ob_get_clean();
  
  $oContext->fSetResponseCode(200);
  //$oContext->fSetResponseHeader('Cache-Control', 'max-age=0, must-revalidate, no-cache, no-store');
  $oContext->fSetResponseHeader('Content-Type', 'text/html;charset=utf-8');
  $oContext->fSetResponseContent($sPage);
  