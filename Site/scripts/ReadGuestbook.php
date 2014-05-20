<?php
    // Autor des Gästebuch lese Script: Daniel Tatzel

    // Baue Verbindung auf
    $dbConnection = ConnectToDB();
        
    // Set the case in which to return column_names.
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("select * from gaestebuch where autorisiert = :selection");

    $query->bindParam( ":selection", $_POST['selection'] );
    
    $query->execute();
    $result = $query->fetch(PDO::FETCH_LAZY);

    // result weiter verarbeiten
?> 
