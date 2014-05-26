<?php

// Inkludiert die Funktion zur Anmeldung
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");

/* // prevent direct access
  $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
  if (!$isAjax) {
  $user_error = 'Access denied - not an AJAX request...';
  trigger_error($user_error, E_USER_ERROR);
  } */

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
    //echo "Verbindung hergestellt<br>";
} catch (Exception $e) {
    die("keine Verbindung möglich: " . $e->getMessage());
}

/*if ($conn->connect_error) {
    echo 'Database connection failed...' . 'Error: ' . $conn->connect_errno . ' ' . $conn->connect_error;
    exit;
} else {
    $conn->set_charset('utf8');
}*/
/**
 * Create SQL
 */
$sql = "SELECT * FROM suche WHERE (Wohnort LIKE '" . $term . "%') or (fach LIKE '" . $term . "%')";
//echo $sql;
$sth = $conn->prepare($sql);
$sth->execute();

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    if (stristr($row['Wohnort'], $term)) {
        $a_json_row["id"] = "Orte.php";
        $a_json_row["value"] = $row['Wohnort'];
        $a_json_row["label"] = $row['Wohnort'];
        array_push($a_json, $a_json_row);
    } else if (stristr($row['fach'], $term)) {
        $a_json_row["id"] = "Tutoren.php";
        $a_json_row["value"] = $row['fach'];
        $a_json_row["label"] = $row['fach'];
        array_push($a_json, $a_json_row);
    }
}

$json = json_encode($a_json);
//echo $json;
print $json;
?>
