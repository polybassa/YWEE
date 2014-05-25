<?php
	/*
	 * author: Florian Laufenböck
	 * sript: to edit and delete your profile
	 */
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	
	$titel = "Profil bearbeiten";
	$_SESSION['sprache'] = "de";
	
	if(isset($_SESSION["user"]))
	{	
		// first: connection to DB
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");
        $dbConnection = ConnectToDB();     
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        
        $query = "UPDATE mitglieder Set plz=?,wohnort=?,strasse=?,hausnummer=?,email=?,telefon=? WHERE benutzername = '" . $_SESSION['user'] . "'";
        
        $que = $dbConnection->prepare($query);
        $que->execute(array($_POST['plz'],$_POST["wohnort"],$_POST["strasse"],$_POST["hausnummer"],$_POST["email"],$_POST["telefon"]));
	}
	else
		echo "<h2>Ups... Das hätte nicht passieren dürfen. Sie sind nicht eingeloggt!</h2>";
?>
