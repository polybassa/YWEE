<?php
session_set_cookie_params(10800);
session_start();
/* ^ Muss direkt am anfang stehen vor allem anderen!! */


/* Session basierter Counter Idee mit PDO (getestet) -- Daniel Tatzel */
/* PDO muss erst noch weiter angeschaut werden, hat aber bereits bei der lokalen DB funktioniert */

echo "Inhalt ".$_SESSION['counter_ip']."-";
$_SESSION['counter_ip'] = true;
echo "Inhalt ".$_SESSION['counter_ip']."-";
if ( isset( $_SESSION['counter_ip'] ) )
{
    /* Verbindung aufbauen */
    $dsn = 'mysql:dbname=uni;host=127.0.0.1';
    $user = 'dekan';
    $pass = 'passwd';

    $_SESSION['counter_ip'] = true;

    // Baue Verbindung auf
    $dbConnection = new PDO($dsn, $user, $pass);

    // Set the case in which to return column_names.
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("update Counter set number = number + 1");
    $query->execute();

    $query = $dbConnection->prepare("select * from Studenten;");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_LAZY);

    echo "Counter: ".$result["MatrNr"]."<br>";
    
    
    //print_r($result);
}
?> 
