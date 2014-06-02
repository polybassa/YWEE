<?php
    // Autor des Gästebuch lese Script: Daniel Tatzel

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
    
    // Baue Verbindung auf
    try {
        $dbConnection = ConnectToDB();
    } catch (Exception $e) {
        die("keine Verbindung möglich: " . $e->getMessage());
    }
        
    // Set the case in which to return column_names.
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("select * from gaestebuch where autorisiert = 1 or autorisiert = 2");
    
    if ( $query->execute() )
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($result);
<<<<<<< HEAD
	//return json_encode($result);
    //print_r($result);
=======
	// return json_encode($result);
    // print_r($result);
>>>>>>> 67491ab76866d7650746b0fd31895006218a6dbc
    
    $dbConnection = null;
?> 
