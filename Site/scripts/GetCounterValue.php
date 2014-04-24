<?php
    // Autor von GetCounterValue(): Daniel Tatzel
    // Holt sich den aktuellen Wert des Counters aus der DB mittels PDO und gibt ihn zurueck

    // Baue Verbindung auf
    $dbConnection = ConnectToDB();
        
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("select * from Counter;");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_LAZY);

    echo $result["number"];
?>
