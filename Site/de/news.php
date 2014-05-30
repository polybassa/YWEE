<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	//$_SESSION['user'] = "admin";
	
	$titel = "News"; // Name der Seite die im Browser angezeigt werden soll
	
	 $_SESSION['sprache'] = "de";
	 
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
	
	if(isset($_SESSION['admin']))
	{
		include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/news.html");       // Inkludiert den Inhalt
	}
	else
	{
		echo "Sie sind nicht als Admin eingeloggt und können deshalb keine Nachrichten schreiben";
	}
	
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>