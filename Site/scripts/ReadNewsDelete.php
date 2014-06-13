<?php
	//Autor: Alexander Strobl
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
	if($query->execute() )
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		
	$dbConnection = null;
?>