<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session

    $titel = "Registrierung"; // Name der Seite die im Browser angezeigt werden soll

    $_SESSION['sprache'] = "de";
    
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    
    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session

    if ( !isset($_SESSION['logged-in']) )
    {
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/registrierung.html");       // Inkludiert den Inhalt
    }
    else
    {
?>
        <script type="text/javascript">
            <!--
            window.location = "http://ebenezer-kunatse.net/de/profile.php";
            //-->
        </script>
<?php
    }

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
