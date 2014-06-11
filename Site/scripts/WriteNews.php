<?php

//News schreiben, für den Admin, Tobias Schwindl
//include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
// Baue Verbindung auf
try {
    $dbConnection = ConnectToDB();
} catch (Exception $e) {
    die("keine Verbindung möglich: " . $e->getMessage());
}

// SECURITY HOLE ***************************************************************
// allow space, any unicode letter and digit, underscore and dash
/* Nicht benötigt
  if ( preg_match("/[^\040\pL\pN_-]/u", $_POST['nachricht']) || preg_match("/[^\040\pL\pN_-]/u", $_POST['subject'])) {
  exit;
  }
 */

// replace multiple spaces with one
$msg = preg_replace('/\s+/', ' ', $_POST['nachricht']);
$subject = preg_replace('/\s+/', ' ', $_POST['subject']);

/* Nicht noetig und auch gefaehrlich, da andere lib!
 * mysql_real_escape_string($msg);
 */

// Set the case in which to return column_names.
$dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

$query = $dbConnection->prepare("insert into news (benutzername, zeit, nachricht, betreff) VALUES ( :user, CURRENT_DATE, :msg, :subject)");

$query->bindParam(":msg", $msg);
$query->bindParam(":user", $_POST['user']);
$query->bindParam(":subject", $subject);

$query->execute();
$dbConnection = null;
//print_r($_POST);
//auf richtige Seite weiterleiten
?> 

