<?php
	/*
	 * author: Florian Laufenböck
	 * sript: to edit and delete your profile
	 */
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	
	// Titel für Seite setzen
	$titel = "Profil bearbeiten";
	
	$_SESSION['sprache'] = "de";
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
	
	if(isset($_GET['value']))
	{
		//then the profil shall be updated
		include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/takeprofile.php");
		echo "<h1>Profil erfolgreich geändert!</h1>";
	}
	if(isset($_SESSION['user']))
	{	
		if(isset($_GET['password']))
		{
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/ChangePassword.html");
			if(isset($_GET['change']))
			{
				include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ChangePassword.php");
				if($result == false)
				{
					echo "<h1>Das angegebene Passwort war falsch!</h1>";
				}
				else
				{
					echo "<h1>Passwort erfolgreich geändert</h1>";
				}
			}
		}	
		else
		{
			// user isset, so we can take all data from the DB for this user and display it in a formular; not all data's are editable
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/GetProfile.php");
			$result = $result[0];
			// here there is a variable called $result with the result
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/editprofile.html");   // Inkludiert static things
		}
	}
	else
		echo "<h2>Ups... Das hätte nicht passieren dürfen. Sie sind nicht eingeloggt!</h2>";
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
