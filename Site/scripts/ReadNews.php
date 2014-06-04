<?php
	 include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
    // Baue Verbindung auf
    try 
	{
        $dbConnection = ConnectToDB();
    } catch (Exception $e)
	{
        die("keine Verbindung möglich: " . $e->getMessage());
    }
	
	$query = $dbConnection->prepare("SELECT * FROM news where 1 order by id desc");
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_ASSOC);
	
	//print_r($results);
	echo json_encode($results);
	
	$dbConnection = null;
?>