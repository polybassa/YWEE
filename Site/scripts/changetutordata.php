<?php

	//author : Florian Laufenböck
	// first: connection to DB
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");
	$dbConnection = ConnectToDB();     
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        
    $query = "UPDATE tutoren Set umkreis=?,stundenlohn=? WHERE benutzername = '" . $_SESSION['user'] . "'";
    $que = $dbConnection->prepare($query);
    $que->execute(array($umkreis,$gehalt));
    
    $dbConnection = null;

?>
