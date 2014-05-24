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
        Banner: Links das Logo, danaben Slideshow
    </div>

<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/nav.php");      // Inkludiert die Navigationsleist
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/leftbar.php");  // Inkludiert den linken Balken
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/rightbar.php"); // Inkludiert den rechten Balken
?>
