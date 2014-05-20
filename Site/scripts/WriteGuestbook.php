<?php
    // Autor des Gästebucheintrag erstell Script: Daniel Tatzel

    // Baue Verbindung auf
    $dbConnection = ConnectToDB();
        
    // Set the case in which to return column_names.
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("insert into login (eintrag, benutzername, autorisiert) VALUES ( :mesg, :user, 0)");

    $query->bindParam( ":mesg", md5( $_POST['eintrag'] ) );
    $query->bindParam( ":user", $_POST['username'] );
    
    $query->execute();
?> 
