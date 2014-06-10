<?php

// Autor des Gästebucheintrag erstell Script: Daniel Tatzel

include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
// Baue Verbindung auf
try {
    $dbConnection = ConnectToDB();
} catch (Exception $e) {
    die("keine Verbindung möglich: " . $e->getMessage());
}

// SECURITY HOLE ***************************************************************
// allow space, any unicode letter and digit, underscore and dash
if (preg_match("/[^\040\pL\pN_-]/u", $_POST['eintrag']) || preg_match("/[^\040\pL\pN_-]/u", $_POST['username'])) {
    echo 'FUCK';
    exit;
}

// replace multiple spaces with one
$user = preg_replace('/\s+/', ' ', $_POST['username']);
$msg = preg_replace('/\s+/', ' ', $_POST['eintrag']);

// Set the case in which to return column_names.
$dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

$query = $dbConnection->prepare("insert into gaestebuch (eintrag, benutzername, autorisiert) VALUES ( :mesg, :user, 0)");

$query->bindParam(":mesg", $msg);
$query->bindParam(":user", $user);

$query->execute();

$dbConnection = null;

if ($_POST['sprache'] == "en") {
    header("Location: http://ebenezer-kunatse.net/en/guestbook.php");
    exit;
} else {
    header("Location: http://ebenezer-kunatse.net/de/gaestebuch.php");
    exit;
}
?> 
