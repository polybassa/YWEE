<?php

	/*
	 * author: Florian Laufenböck
	 * script to test if the user is a tutor
	 */

	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	if(isset($_SESSION['user']))
	{
		include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php"); // connection to DB
		$dbConnection = ConnectToDB();
		$dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
		$query = $dbConnection->prepare("select * from tutoren where benutzername = '" . $_SESSION['user'] . "'");		
		if($query->execute())
		{
			$tutor_result = $query->fetchAll(PDO::FETCH_ASSOC);
			return true;
		}
		else
			return false;
	}
	else
		$tutor_result = false;

?>
