<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    //include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
    //include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/login.php");         // Inkludiert das Login Script. Bleibt vorerst so, muesste mit AJAX implementiert werden

    $titel = "Die Seite konnte nicht gefunden werden"; // Name der Seite die im Browser angezeigt werden soll
    $StatusCodeError = 1;   // Wird (nur!) hier fuer Login und -out benoetigt (Script wird wegen dem Rewrite nicht ausgefuehrt)

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/nav.php");      // Inkludiert die Navigationsleist
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/leftbar.php");  // Inkludiert den linken Balken
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/rightbar.php"); // Inkludiert den rechten Balken

    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST

    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session

    if ( !isset( $_SESSION['sprache'] ) )
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/404.html");       // Inkludiert den deutschen Inhalt
    else
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/404.html");       // Inkludiert den englischen Inhalt

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
