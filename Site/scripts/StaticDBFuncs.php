<?php
    function GetCounterValue()
    {
        // Baue Verbindung auf
        $dbConnection = ConnectToDB();
        
        // Set the case in which to return column_names.
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        $query = $dbConnection->prepare("select * from Counter;");
        $query->execute();

        $result = $query->fetch(PDO::FETCH_LAZY);

        return $result["number"];
    }
?>
