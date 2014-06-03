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
        <?php header('X-UA-Compatible: IE=edge'); ?>
        <meta name="description" content="Die Tutoren AG ist DIE Anlaufstelle f&uuml;r wissenshungrige, die nach einem Tutor in ihrer N&auml;he suchen!!!">
        <meta name="viewport" content="width=device-width, initial-scale=1">


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

            <div id="banner" >
                <!--Div Box für logo img-->
                <div id= "logo">
                    <img src="/images/logo.gif" class="logo" alt="logo">
                </div>

                <!--Slideshow. die texte sind nicht must have und können auch entfernt werden img
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
                -->

                <?php
                include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/nav.php");      // Inkludiert die Navigationsleist
                include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/leftbar.php");  // Inkludiert den linken Balken
                include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/rightbar.php"); // Inkludiert den rechten Balken
                ?>
