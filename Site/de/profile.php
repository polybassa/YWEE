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
	
	if(isset($_GET['username']))
	{	
		//get username and save it for later use by seeing profile's
		$fl_username = $_GET['username'];
	}
	else
		$fl_username = $_SESSION['user'];	// wenn kein Benutzername angegeben ist, dann wird das eigene Profil geholt

	if(isset($_SESSION['user']))
	{	
		if(isset($_GET['DeleteProfile']))
		{
			if($_GET['DeleteProfile'] == 'true')
			{
				//insert functions for deleting profile
				include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/DeleteProfile.php");
				unset($_SESSION['user']);
				unset($_SESSION['logged-in']);
				include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/ProfileDeleteRight.html");
				exit();
			}
		}
		if(isset($_GET['value']))
		{
			//then the profil shall be updated
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/takeprofile.php");
			echo "<h1>Profil erfolgreich geändert!</h1>";
		}
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
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/beeingTutor.php");
			// user isset, so we can take all data from the DB for this user and display it in a formular; not all data's are editable
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/GetProfile.php");
			if(isset($result[0]))
			{
				$result = $result[0];
				include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/profile.html");   // Inkludiert static things
			}
			else  // this user doesn't exist
				include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/noProfile.html");
		}
	}
	else
		echo "<h2>Ups... Das hätte nicht passieren dürfen. Sie sind nicht eingeloggt!</h2>";
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
