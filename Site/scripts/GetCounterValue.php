<?php
    // Autor von GetCounterValue.php: Daniel Tatzel
    // Holt sich den aktuellen Wert des Counters aus der DB mittels PDO und gibt ihn zurueck

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
    
    // Baue Verbindung auf
    try {
        $dbConnection = ConnectToDB();
    } catch (Exception $e) {
        die("keine Verbindung möglich: " . $e->getMessage());
    }
        
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("select * from besucherzaehler");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_LAZY);

    echo $result["zaehler"];
?>
