<?php

function ConnectToDB()
{
    // Verbindung aufbauen
    $dsn = 'mysql:dbname=uni;host=127.0.0.1';
    $user = 'dekan';
    $pass = 'passwd';

    // Baue Verbindung auf
    $dbConnection = new PDO($dsn, $user, $pass);
    
    return $dbConnection;
}

?>
