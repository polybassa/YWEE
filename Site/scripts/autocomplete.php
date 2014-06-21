<?php
/*
 * author: Nils Weiss
 * script for json Object of autocomplete values 
 * 
 */
// Inkludiert die Session
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       
// Inkludiert die Funktion zur Anmeldung
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");

// prevent direct access
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if (!$isAjax) {
    $user_error = 'Access denied - not an AJAX request...';
    trigger_error($user_error, E_USER_ERROR);
}
// get what user typed in autocomplete input
$term = trim($_GET['term']);

$a_json = array();
$a_json_row = array();

$a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are permitted..."));
$json_invalid = json_encode($a_json_invalid);

// replace multiple spaces with one
$term = preg_replace('/\s+/', ' ', $term);

// SECURITY HOLE ***************************************************************
// allow space, any unicode letter and digit, underscore and dash
if (preg_match("/[^\040\pL\pN_-]/u", $term)) {
    print $json_invalid;
    exit;
}
// *****************************************************************************
// database connection
try {
    $conn = ConnectToDB();
} catch (Exception $e) {
    die("keine Verbindung möglich: " . $e->getMessage());
}

// Create SQL Query
if (isset($_SESSION['logged-in'])) {
    $sql = "SELECT * FROM suche WHERE (Wohnort LIKE '" . $term . "%') or (fach LIKE '" . $term . "%') or (benutzername LIKE '" . $term . "%')";
} else {
    $sql = "SELECT * FROM suche WHERE (Wohnort LIKE '" . $term . "%') or (fach LIKE '" . $term . "%')";
}
// Execute SQL Query
$sth = $conn->prepare($sql);
$sth->execute();

// iterate throw results and fill output array
while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    if (stristr($row['Wohnort'], $term)) {
        $a_json_row["id"] = "/de/search.php";
        $a_json_row["value"] = $row['Wohnort'];
        $a_json_row["typ"] = "location";
        array_push($a_json, $a_json_row);
    }
    if (stristr($row['benutzername'], $term) && isset($_SESSION['logged-in'])) {
        $a_json_row["id"] = "/de/profile.php?username=" . $row['benutzername'];
        $a_json_row["value"] = $row['benutzername'];
        $a_json_row["typ"] = "user";
        array_push($a_json, $a_json_row);
    }
    if (stristr($row['fach'], $term)) {
        $a_json_row["id"] = "/de/search.php";
        $a_json_row["value"] = $row['fach'];
        $a_json_row["typ"] = "subject";
        array_push($a_json, $a_json_row);
    }
}
// remove multiple entries
$a_json = array_unique($a_json, SORT_REGULAR);
$json = json_encode($a_json);
//return results as json object
print $json;
?>
