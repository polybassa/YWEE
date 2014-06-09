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
    
    $query = "UPDATE login SET rolle = 0 where ";
    
    foreach($tounlockUser as $user)
    {
		$query .= "benutzername= '" . $user . "' or ";
	}
	// hier ist ein " or " zum Schluss zuviel angefügt worden, dies wird jetzt wieder entfernt
	$query = substr($query, 0, strripos($query," or"));
	$que = $dbConnection->prepare($query);
	$que->execute();
	
	$dbConnection = null;

?>
