<?php

	/*
	 * author: Florian Laufenböck
	 * script that 
	 */
	 include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
	
	try {
        $dbConnection = ConnectToDB();
    } catch (Exception $e) {
        die("keine Verbindung möglich: " . $e->getMessage());
    }
    
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    
       $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

	$query_mitglieder = "DELETE from leistung WHERE ";	

	foreach($todeletefach as $fach)	// alle fächer die gelöscht werden sollen
	{
		$query_mitglieder .= "benutzername = '" . $_SESSION['user'] . "' and fach='" .$fach ."' or ";
	}
	// hier ist ein " or " zum Schluss zuviel angefügt worden, dies wird jetzt wieder entfernt
	$query_mitglieder = substr($query_mitglieder, 0, strripos($query_mitglieder," or"));
	$que = $dbConnection->prepare($query_mitglieder);
	$que->execute();
	
	$dbConnection = null;

?>
