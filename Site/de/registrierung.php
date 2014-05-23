<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session

    $titel = "Registrierung"; // Name der Seite die im Browser angezeigt werden soll
    

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/layout/nav.php");      // Inkludiert die deutsche Navigationsleist
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/layout/leftbar.php");  // Inkludiert den deutsche linken Balken
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/layout/rightbar.php"); // Inkludiert den deutsche rechten Balken
    
    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/registrierung.html");       // Inkludiert den Inhalt

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
