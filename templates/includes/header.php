<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?php if (isset($sPageTitle) && !empty($sPageTitle)) echo $sPageTitle . ' - '; ?>BNETDocs</title>
<?php if (isset($sPageAdditionalStyle) && !empty($sPageAdditionalStyle)) {
?>    <link rel="stylesheet" href="<?php echo $sPageAdditionalStyle; ?>" type="text/css" media="all" />
<?php }
?>    <link rel="stylesheet" href="<?php echo BnetDocs::fGetCurrentFullURL('/main.css'); ?>" type="text/css" media="all" />
    <script type="application/javascript" src="<?php echo BnetDocs::fGetCurrentFullURL('/BNETDocs.js'); ?>" />
    <link rel="alternate" href="<?php echo BnetDocs::fGetCurrentFullURL('/rss/news'); ?>" type="application/rss+xml" title="BNETDocs News" />
    <meta name="description" content="Battle.net logon sequences, packets, information, and protocols reference site." />
    <meta name="keywords" content="battle.net, starcraft, warcraft, diablo, blizzard, logon sequences, packets, information, protocols, reference, programming, coding" />
    <meta property="og:site_name" content="BNETDocs" />
    <meta property="og:title" content="<?php if (isset($sPageTitle) && !empty($sPageTitle)) echo $sPageTitle . ' - '; ?>BNETDocs" />
    <meta property="og:url" content="<?php echo BnetDocs::fGetCurrentFullURL('', true); ?>" />
    <meta property="og:locale" content="en-us" />
  </head>
  <body>
    <div id="header">
      Battle.net Documentation
    </div>
    <div id="container">
      <div class="sidebar" id="sidebar_left">
        <div>Quicklinks</div>
        <a href="<?php echo BnetDocs::fGetCurrentFullURL('/'); ?>">Home</a>
        <a href="<?php echo BnetDocs::fGetCurrentFullURL('/news'); ?>">News</a>
        <a href="<?php echo BnetDocs::fGetCurrentFullURL('/user/login'); ?>">Account Login</a>
        <a href="<?php echo BnetDocs::fGetCurrentFullURL('/user/register'); ?>">Create Account</a>
      </div>
      <div id="content">
