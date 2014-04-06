<?php
  
  $aGetQuery  = $oContext->fGetRequestQueryArray();
  $aPostQuery = $oContext->fGetRequestPostArray();
  $aQuery     = array_merge($aGetQuery, $aPostQuery);
  
  $sMode     = (isset($aQuery['mode'])     ? $aQuery['mode']     : '');
  $sUsername = (isset($aQuery['username']) ? $aQuery['username'] : '');
  $sPassword = (isset($aQuery['password']) ? $aQuery['password'] : '');
  
  $sUserLoginFailed     = "";
  $sPasswordResetFailed = "";
  
  $bUserLoginSuccess     = false;
  $bPasswordResetSuccess = false;
  
  switch ($sMode) {
    case 'login': {
      $oUser = User::fFindUserByUsername($sUsername);
      if (!$oUser) {
        $sUserLoginFailed = "Unable to locate that username in our database.";
      } else if (!$oUser->fCheckPassword($sPassword)) {
        $sUserLoginFailed = "Incorrect password.";
      } else {
        $bUserLoginSuccess = true;
        BNETDocs::$oUser = $oUser;
      }
      break;
    }
    case 'reset_password': {
      $oUser = User::fFindUserByUsername($sUsername);
      if (!$oUser) {
        $sPasswordResetFailed = "Unable to locate that username in our database.";
      } else if (!$oUser->fResetVerifiedId()) {
        $sPasswordResetFailed = "Failed to create a verification identifier for the account.";
      } else if (!Email::fSendPasswordReset($oUser)) {
        $sPasswordResetFailed = "Failed to send a password reset email to that account.";
      } else {
        $bPasswordResetSuccess = true;
      }
      break;
    }
  }
  
  ob_start('ob_gzhandler');
  if (isset($aGetQuery['ajax'])) {
    include('./includes/user/login-ajax.php');
  } else {
    include('./includes/user/login.php');
  }
  $sPage = ob_get_clean();
  
  $oContext->fSetResponseCode(200);
  if ($aQuery)
    $oContext->fSetResponseHeader('Cache-Control', 'max-age=0, must-revalidate, no-cache, no-store');
  $oContext->fSetResponseHeader('Content-Type', 'application/xml;charset=utf-8');
  $oContext->fSetResponseContent($sPage);
  