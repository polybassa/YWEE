<?php
	/*
	 * author: Florian Laufenböck
	 * skript for deleting a profile
	 */

	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	
	// first: connection to DB
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");
    $dbConnection = ConnectToDB();     
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);	
    
    $query_mitglieder = "DELETE from mitglieder where benutzername='" . $_SESSION['user'] . "'";
    $query_login = "DELETE from login where benutzername='" . $_SESSION['user'] . "'";
    $que = $dbConnection->prepare($query_mitglieder);
    $que->execute();
    $que_1 = $dbConnection->prepare($query_login);
    $que_1->execute();
?>
