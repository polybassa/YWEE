<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session

    $titel = "Die Seite konnte nicht gefunden werden"; // Name der Seite die im Browser angezeigt werden soll
        
    //$StatusCodeError = 1;   // Wird (nur!) hier fuer Login und -out benoetigt (Script wird wegen dem Rewrite nicht ausgefuehrt)

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/layout/nav.php");      // Inkludiert die englische Navigationsleist
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/layout/leftbar.php");  // Inkludiert den englische linken Balken
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/layout/rightbar.php"); // Inkludiert den englische rechten Balken

    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/content/404.html");       // Inkludiert den Inhalt

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
