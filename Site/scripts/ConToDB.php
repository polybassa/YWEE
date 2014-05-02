<?php
    // Autor von ConnectToDB.php: Daniel Tatzel
    // Baut die Verbindung zur lokalen Datenbank mittels PDO auf
    function ConnectToDB()
    {
        // Verbindung aufbauen

        // Da ich keine Benutzerdaten auf Git hochladen will, da es nicht privat ist, muesst ihr diese auf dem Server lassen!!!!!
        $dsn = 'mysql:dbname=;host=127.0.0.1';
        $user = '';
        $pass = '';

        // Baue Verbindung auf
        $dbConnection = new PDO($dsn, $user, $pass);
        
        return $dbConnection;
    }

?>
