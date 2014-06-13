<?php

	/*
	 * author: Alexander Strobl
	 * script that deletes newsentry by a given ID
	 */
	 include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
	
	try {
        $dbConnection = ConnectToDB();
    } catch (Exception $e) {
        die("keine Verbindung möglich: " . $e->getMessage());
    }
    
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

	$query_mitglieder = "DELETE from news WHERE ";	

	foreach($deleteNews as $id)	// für alle Einträge, deren status geändert werden sollen
	{
		$query_mitglieder .= "id = '" . $id . "' or ";
	}
	// hier ist ein " or " zum Schluss zuviel angefügt worden, dies wird jetzt wieder entfernt
	$query_mitglieder = substr($query_mitglieder, 0, strripos($query_mitglieder," or"));
	$que = $dbConnection->prepare($query_mitglieder);
	$que->execute();
	
	$dbConnection = null;
?>
