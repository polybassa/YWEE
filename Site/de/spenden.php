<?php
// Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	//$lang = $_SESSION['sprache'];
    $titel = "Nachrichten"; // Name der Seite die im Browser angezeigt werden soll

    $_SESSION['sprache'] = "de";
    
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    
    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session
	
	//Hier kommt der Inhalt rein
	
	//normale Spedenseite
	
	if(isset($_SESSION['logged-in'])
	{
		//Formular
	}
	
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer

?>