<?php
//include("/scripts/counter.php");

// Anpassung und Aufteilung des Layouts: Daniel Tatzel

// Muss in der Reihenfolge bleiben
$titel = "Die Seite konnte nicht gefunden werden"; // Name der Seite die im Browser angezeigt werden soll

include("$_SERVER[DOCUMENT_ROOT]/layout/header.php");   // Inkludiert den Header
include("$_SERVER[DOCUMENT_ROOT]/layout/nav.php");      // Inkludiert die Navigationsleiste
include("$_SERVER[DOCUMENT_ROOT]/layout/leftbar.php");  // Inkludiert den linken Balken
include("$_SERVER[DOCUMENT_ROOT]/layout/rightbar.php"); // Inkludiert den rechten Balken

// Inhalt von: Daniel Tatzel
?>

<h2>Fehler</h2>

<p>Die von Ihnen angeforderte Seite konnte leider nicht gefunden werden.</p>

<?php include("layout/footer.php"); // Inkludiert den Footer ?>
