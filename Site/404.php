<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
    //include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
    //include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/login.php");         // Inkludiert das Login Script. Bleibt vorerst so, muesste mit AJAX implementiert werden

    if ( $_SESSION['sprache'] == 'en' || $_GET['lang'] == 'en' )
        $titel = "Could not find site"; // Englischer Name der Seite die im Browser angezeigt werden soll
    else
        $titel = "Die Seite konnte nicht gefunden werden"; // Deutscher Name der Seite die im Browser angezeigt werden soll
        
    $StatusCodeError = 1;   // Wird (nur!) hier fuer Login und -out benoetigt (Script wird wegen dem Rewrite nicht ausgefuehrt)

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header

    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session

    if ( $_SESSION['sprache'] == 'en' || $_GET['lang'] == 'en' )
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/404.html");       // Inkludiert den deutschen Inhalt
    else
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/404.html");       // Inkludiert den englischen Inhalt

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
