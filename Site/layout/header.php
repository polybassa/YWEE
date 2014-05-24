<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link type="text/css" href="/test_02/layout/style.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" type="text/css" media="all" href="./test_02/layout/slide.css" />    <!-- muss noch angepasst werden (Modernizr und javascript slideshow !!!)-->	
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
       <!--Div Box für logo img-->
	   <div id= "logo">
	   <img src="test_02/images/logo.gif" class="logo">
	   </div>
	   
	   <!--Slideshow. die texte sind nicht must have und können auch entfernt werden img-->
	   <div id="show">
			<div class="img1 slide">
				<img src="test_02/images/slider_img1.jpg" class="slider_img" />
				<p class="desc">"Dank Die Tutoren Agentur hat sich meine Note in Deutsch von einer 5 auf eine 2 verbessert" - Karlos 18 </p>
			</div>
			<div class="img2 slide">
				<img src="test_02/images/slider_img2.jpg" class="slider_img" />
				<p class="desc">Montag 19.05.14 Infoveranstalltung an der OTH Regensburg zum Thema: "Erweiterte Faulheitsstrategien"</p>
			</div>
			<div class="img3 slide">
				<img src="test_02/images/slider_img3.jpg" class="slider_img" />
				<p class="desc">"Dank Die Tutoren Agentur kann mein Sohn jetzt auch bis 10 zählen", Harry(42) Vater von Sohn Felix (20) </p>
			</div>
			<div class="img4 slide">
				<img src="test_02/images/slider_img4.jpg" class="slider_img" />
				<p class="desc">Filmtipp der Woche: ÜML aus dem Eis</p>
			</div>
			<div class="img5 slide">
				<img src="test_02/images/slider_img5.jpg" class="slider_img" />
				<p class="desc">"Ich kann meinen Namen jetzt auch schreiben" - Anita 35, studiert soziale Arbeit</p>
			</div>
		
		
		
		
		
    </div>

<?php

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/nav.php");      // Inkludiert die Navigationsleist
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/leftbar.php");  // Inkludiert den linken Balken
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/rightbar.php"); // Inkludiert den rechten Balken
?>
