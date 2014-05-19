<?php
    // Autor des Counters: Daniel Tatzel

    // Baue Verbindung auf
    $dbConnection = ConnectToDB();
        
    // Set the case in which to return column_names.
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("update besucherzaehler set zaehler = zaehler + 1");
    $query->execute();
?> 
