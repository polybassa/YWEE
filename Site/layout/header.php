<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <link type="text/css" href="/layout/style.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" type="text/css" media="all" href="/layout/slide.css" />    <!-- muss noch angepasst werden (Modernizr und javascript slideshow !!!)-->

    <!-- test von Daniel mit HTML5 Boilerplate -->
    <link rel="stylesheet" href="/layout/normalize.css">
    <link rel="stylesheet" href="/layout/main.css">
    <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

    <title><?php echo $titel ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

     
    <script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/login.js" type="text/javascript"></script>
    <script src="/js/registrierung.js" type="text/javascript"></script>
</head>
<body>
    <!--
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
    -->
    <script src="/js/plugins.js"></script>
    
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
    -->
    
<div id="container">

    <div id="banner" >
       <!--Div Box für logo img-->
	   <div id= "logo">
	   <img src="/images/logo.gif" class="logo">
	   </div>
	   
	   <!--Slideshow. die texte sind nicht must have und können auch entfernt werden img-->
	   <div id="show">
			<div class="img1 slide">
				<img src="/images/slider_img1.jpg" class="slider_img" />
				<p class="desc">"Dank Die Tutoren Agentur hat sich meine Note in Deutsch von einer 5 auf eine 2 verbessert" - Karlos 18 </p>
			</div>
			<div class="img2 slide">
				<img src="/images/slider_img2.jpg" class="slider_img" />
				<p class="desc">Montag 19.05.14 Infoveranstalltung an der OTH Regensburg zum Thema: "Erweiterte Faulheitsstrategien"</p>
			</div>
			<div class="img3 slide">
				<img src="/images/slider_img3.jpg" class="slider_img" />
				<p class="desc">"Dank Die Tutoren Agentur kann mein Sohn jetzt auch bis 10 zählen", Harry(42) Vater von Sohn Felix (20) </p>
			</div>
			<div class="img4 slide">
				<img src="/images/slider_img4.jpg" class="slider_img" />
				<p class="desc">Filmtipp der Woche: ÜML aus dem Eis</p>
			</div>
			<div class="img5 slide">
				<img src="/images/slider_img5.jpg" class="slider_img" />
				<p class="desc">"Ich kann meinen Namen jetzt auch schreiben" - Anita 35, studiert soziale Arbeit</p>
			</div>
    </div>

<?php

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/nav.php");      // Inkludiert die Navigationsleist
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/leftbar.php");  // Inkludiert den linken Balken
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/rightbar.php"); // Inkludiert den rechten Balken
?>
