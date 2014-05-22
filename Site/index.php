<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/counter.php");       // Inkludiert den Counter Script

    if ( $_SESSION['sprache'] == 'en' || $_GET['lang'] == 'en' )
        $titel = "Homepage"; // Englischer Name der Seite die im Browser angezeigt werden soll
    else
        $titel = "Startseite"; // Deutscher Name der Seite die im Browser angezeigt werden soll
    

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header

    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session

    if ( $_SESSION['sprache'] == 'en' || $_GET['lang'] == 'en' )
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/index.html");       // Inkludiert den deutschen Inhalt
    else
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/index.html");       // Inkludiert den englischen Inhalt

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
