<?php
	/*
	 * author: Florian Laufenböck
	 * script to get all data from a user
	 * 
	 */
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php"); 
    try {
        $dbConnection = ConnectToDB();
    } catch (Exception $e) {
        die("keine Verbindung möglich: " . $e->getMessage());
    }
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
		
	$query_fach = $dbConnection->prepare("select * from leistung where benutzername='" . $fl_username . "'");
	$query_tut = $dbConnection->prepare("select * from tutoren where benutzername='" . $fl_username . "'");
	
	if($query_fach->execute())
    {	
        $AllFachfromTutor = $query_fach->fetchAll(PDO::FETCH_ASSOC);
    }
    if($query_tut->execute())
    {
		$AllTutorData = $query_tut->fetchAll(PDO::FETCH_ASSOC);
	}
	
	$dbConnection = null;

?>
