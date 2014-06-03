<?php

	/*
	 * author: Florian Laufenböck
	 * script to get the users when you have the letter username
	 * 
	 */
	 
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php"); 
    try {
        $dbConnection = ConnectToDB();
    } catch (Exception $e) {
        die("keine Verbindung möglich: " . $e->getMessage());
    }
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    
    $query = "select benutzername from login where benutzername like '" . $letter_to_take . "%'";
    $que = $dbConnection->prepare($query);
    
    if($que->execute())
    {	
        $ad_result = $que->fetchAll(PDO::FETCH_ASSOC);
    }
	$dbConnection = null;

?>
