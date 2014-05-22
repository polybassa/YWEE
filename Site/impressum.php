<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session

    if ( $_SESSION['sprache'] == 'en' || $_GET['lang'] == 'en' )
        $titel = "Site notice"; // Englischer Name der Seite die im Browser angezeigt werden soll
    else
        $titel = "Impressum"; // Deutscher Name der Seite die im Browser angezeigt werden soll
    
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header

    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session

    if ( $_SESSION['sprache'] == 'en' || $_GET['lang'] == 'en' )
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/impressum.html");       // Inkludiert den englischen Inhalt
    else
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/impressum.html");       // Inkludiert den deutschen Inhalt
        

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
