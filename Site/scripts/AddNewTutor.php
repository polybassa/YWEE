<?php
	/*
	 * author: Florian Laufenböck
	 */
	 include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
	
	try {
        $dbConnection = ConnectToDB();
    } catch (Exception $e) {
        die("keine Verbindung möglich: " . $e->getMessage());
    }
    
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    
    $query_tutoren = "INSERT INTO tutoren VALUES ('" . $_SESSION['user'] . "', " .$_POST['umkreis'] . ", " . $_POST['gehalt'] .")";
    $query_leistungen = "INSERT INTO leistung VALUES('" . $_SESSION['user'] . "', '" . $_POST['fach'] . "', " . $_POST['stufe'] . ")";
    
    $que_tutoren = $dbConnection->prepare($query_tutoren);
    $que_leistungen = $dbConnection->prepare($query_leistungen);
    
    if(!$que_tutoren->execute() or !$que_leistungen->execute())
    {
		//ein fehler ist passiert
		echo print_r('Unbekannter Datenbankfehler in AddNewTutor.php');
	}
	
	$dbConnection = null;

?>
