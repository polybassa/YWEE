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
	
	if(isset($_SESSION['user']))
	{
		$theUserName = $_SESSION['user'];
		include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/beeingTutor.php");
		if(isset($_GET['newtutor']) and $_GET['newtutor'] == true)
		{
			// wenn man gerade zum neuen tutor geworden ist mit einem fach
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/AddNewTutor.php");
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/tutoryes.html");	// bestätigungsseite, das man gerade tutor geworden ist
		}
		else if(isset($_GET['newfach']) and $_GET['newfach'] == true)
		{
			// wenn beim tutor ein neues fach hinzugefügt werden soll
			if(isset($_GET['fired']) and $_GET['fired'] == true)
			{
				$fach = $_POST['fach'];
				$stufe = $_POST['stufe'];
				include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/tut_newfach.php");
			}
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/newfach.html");
		}
		else if((isset($_GET['new']) and $_GET['new'] == true) or !$tutor_result)	// wenn man noch kein tutor ist
		{
			include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/tutor_new.html");
		}
		else
		{
			if(isset($_GET['deletefach']) and $_GET['deletefach'] == true and isset($_POST["fach_loeschen"]))
			{
				//wenn ein fach/fächer gelöscht werden sollen
				$todeletefach = $_POST["fach_loeschen"];	//array
				include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/deletefach.php");
			}
			else if(isset($_GET['changedata']) and $_GET['changedata'] == true)
			{
				$umkreis = $_POST['umkreis'];
				$gehalt = $_POST['gehalt'];
				include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/changetutordata.php");
			}
			// wenn man bereits tutor ist
			/* was man können soll
			 * - alte Fächer sehen
			 * - neue Fächer hinzufügen
			 * - Daten verändern(umkreis, gehalt)
			 */
			 include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/getAllTutorData.php");
			 // hier hat man nun alle Daten zu diesem Tutor
			 $allfach = "";
			 foreach($AllFachfromTutor as $fach)
			 {
				 $allfach .= "<tr>";
				 $allfach .= "<th> " . $fach['fach'] ."</th>";
				 $allfach .= "<th> " . $fach['stufen'] ."</th>";
				 $allfach .= '<th><input type="checkbox" name="fach_loeschen[]" value="'. $fach['fach'].'"></th>';
				 $allfach .= "</tr>";
			 }
			 $tutor_data = $AllTutorData[0];
			 include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/tutor.html");
		}
		
	}
?>
