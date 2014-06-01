<?php
	/*
	 * author: Florian Laufenböck
	 * script to get all profiledata and return it
	 */
	
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php"); // connection to DB
    $dbConnection = ConnectToDB();
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    $query = $dbConnection->prepare("select * from mitglieder where benutzername = '" . $fl_username . "'");
    if($query->execute())
	{	
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	else
		return null;
		
	$dbConnection = null;	// delete DB-Connection
?>
