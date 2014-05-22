<?php
    // Autor des Gästebucheintrag erstell Script: Daniel Tatzel

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
    
    // Baue Verbindung auf
    $dbConnection = ConnectToDB();
        
    // Set the case in which to return column_names.
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("insert into gaestebuch (eintrag, benutzername, autorisiert) VALUES ( :mesg, :user, 0)");

    $query->bindParam( ":mesg", $_POST['eintrag'] );
    $query->bindParam( ":user", $_POST['username'] );
    
    $query->execute();

    $dbConnection = null;
?> 
