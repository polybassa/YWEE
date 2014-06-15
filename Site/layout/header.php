<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="utf-8">
        <?php header('X-UA-Compatible: IE=edge'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="YWEE Gruppe_02">
		<meta name="description" lang="de" content="'Die Tutoren AG' ist DIE Anlaufstelle f&uuml;r wissenshungrige, die nach einem Tutor in ihrer N&auml;he suchen!!! 
		Wenn Sie selbst gerne unterrichten und Geld verdienen wollen, melden Sie sich an und werden Tutor!">
		<meta name="keywords" lang="de" content="Tutor, Nachhilfe, Unterricht, Lernen">
		<meta name="description" lang="en" content="'Die Tutoren AG' is THE contact point for inquisitive people, who search for a tutor nearby!!! 
		Register and become a tutor if you like to teach and earn big money!">
		<meta name="keywords" lang="en" content="tutor, tutoring, lesson, education, learning, study">
        
		<link type="text/css" href="/layout/style.css" rel="stylesheet" media="screen" />
        <noscript>
            <link rel="stylesheet" type="text/css" media="all" href="/layout/slide.css" />
        </noscript>
		<link rel="stylesheet" type="text/css" media="all" href="/layout/cssmenu.css" />
        
		<!-- HTML5 Boilerplate -->
        <link rel="stylesheet" href="/layout/normalize.css">
        <link rel="stylesheet" href="/layout/main.css">
        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
		
		<script>
		/*Browserweiche für das Video*/
		function BrowserDetection() {
                
                //Check if browser is IE or not
                if (navigator.userAgent.search("rv:11.0") >= 0) {
                    document.write('<link rel="Stylesheet" href="/layout/video_ie.css" type="text/css" />');
                }
                //Check if browser is Chrome or not
                if (navigator.userAgent.search("Chrome") >= 0) {
                    document.write('<link rel="Stylesheet" href="/layout/video_gc.css" type="text/css" />');
                }
                //Check if browser is Firefox or not
                if (navigator.userAgent.search("Firefox") >= 0) {
                    document.write('<link rel="Stylesheet" href="/layout/video_mf.css" type="text/css" />');
                }
				/*
                //Check if browser is Safari or not
                else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                    document.write('<link rel="Stylesheet" href="/layout/video_sa.css" type="text/css" />');
                }
                //Check if browser is Opera or not
                else if (navigator.userAgent.search("Opera") >= 0) {
                    document.write('<link rel="Stylesheet" href="/layout/video_op.css" type="text/css" />');
                }*/
				else{
					document.write('<link rel="Stylesheet" href="/layout/video_mf.css" type="text/css" />');
				}
				
            }
		BrowserDetection();
		</script>

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

        <title><?php echo $titel ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Includes for registrierung und login 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script src="/js/jquery-1.10.2.min.js"></script> 
        <script src="/js/login.js" type="text/javascript"></script>

        <!-- Includes for autocompletion -->
        <link rel="stylesheet" type="text/css" href="/layout/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="/layout/autocomplete.css">
        <script src="/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="/js/jquery.ui.autocomplete.js"></script>
        <script src="/js/jquery.ui.autocomplete.html.js"></script>
        <script src="/js/autocomplete.js"></script>

        <!-- Includes for dataTable -->
        <link rel="stylesheet" type="text/css" href="/layout/jquery.dataTables.css">
        
        <!-- Inlclude for jquery validate -->
        <script src="/js/jquery.validate.min.js"></script>
        <!-- Includes for Menu responsive -->
		<?php
		if ( $_SESSION['sprache'] == "en" )
		{
            echo '<script type="text/javascript" src="/js/menu_jquery_en.js"></script>';
		}
		else
		{
            echo '<script type="text/javascript" src="/js/menu_jquery_de.js"></script>';
		}
		?>
			
		<!-- font -->
		<link href='http://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Changa+One' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		
		<!-- Slideshow CSS/JS Modernizr Abfrage -->
		<script>
		yepnope({
			test : Modernizr.cssanimations,
			yep  : '/layout/slide.css',
			nope : '/js/slide.js'
		});    
		</script>
	
	</head>
    <body>

        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-51517596-1', 'ebenezer-kunatse.net');
            ga('send', 'pageview');
        </script>

        <div id="container">

            <?php
                include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/banner.html");  // Inkludiert den Banner
                include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/nav.php");      // Inkludiert die Navigationsleist
                include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/leftbar.php");  // Inkludiert den linken Balken
                include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/rightbar.php"); // Inkludiert den rechten Balken
            ?>
