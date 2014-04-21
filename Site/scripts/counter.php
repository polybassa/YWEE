<?php
session_set_cookie_params(10800);
session_start();
/* ^ Muss direkt am anfang stehen vor allem anderen!! */

// Autor des Sessionbasierten Counters: Daniel Tatzel

/* PDO muss erst noch weiter angeschaut werden, hat aber bereits bei der lokalen DB funktioniert */
//include("ConToDB.php");

if ( !isset( $_SESSION['counter_ip'] ) )
{

    $_SESSION['counter_ip'] = true;

    // Baue Verbindung auf
    $dbConnection = ConnectToDB();
    
    // Set the case in which to return column_names.
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("update Counter set number = number + 1");
    $query->execute();
    
    /* In StaticDBFuncs definiert
    $query = $dbConnection->prepare("select * from Counter;");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_LAZY);

    echo "Counter: ".$result["MatrNr"]."<br>";
    */
    
    //print_r($result);

}

?> 
