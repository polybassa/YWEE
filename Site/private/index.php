<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/login.php");         // Inkludiert das Login Script. Bleibt vorerst so, muesste mit AJAX implementiert werden

    $titel = "Privater Ordner"; // Name der Seite die im Browser angezeigt werden soll
    

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header

    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/private/content/index.html");       // Inkludiert den Inhalt

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
