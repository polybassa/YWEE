<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link type="text/css" href="/layout/style.css" rel="stylesheet" media="screen" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

    <title><?php echo $titel ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/login.js" type="text/javascript"></script>
</head>
<body>

<div id="container">

    <div id="banner" >
        <!-- <a href="http://www.intensivstation.ch"><img src="http://www.intensivstation.ch/files/images/monorom_css_logo.gif" alt="" width="414" height="56" border="0" /></a>
            <h1>service for a better code</h1>
        -->
        Banner (insgesamt 900 Pixel breit): Links das Logo, danaben Slideshow
    </div>

<?php

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/nav.php");      // Inkludiert die Navigationsleist
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/leftbar.php");  // Inkludiert den linken Balken
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/rightbar.php"); // Inkludiert den rechten Balken
?>
