<?php
/*
	 * author: Nils Weiss
	 * script for output of location values 
	 * 
	 */

// Anpassung und Aufteilung des Layouts: Daniel Tatzel
// Muss in der Reihenfolge bleiben
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");

$value = trim($_GET['term']);

$titel = 'Tutoren in ' . $value; // Name der Seite die im Browser angezeigt werden soll

include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header

$_SESSION['sprache'] = "de";

//print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
//echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session
// get what user typed in autocomplete input

$a_json = array();
$a_json_row = array();

// replace multiple spaces with one
$value = preg_replace('/\s+/', ' ', $value);

// SECURITY HOLE ***************************************************************
// allow space, any unicode letter and digit, underscore and dash
if (preg_match("/[^\040\pL\pN_-]/u", $value)) {
    exit;
}
// *****************************************************************************
// database connection
try {
    $conn = ConnectToDB();
} catch (Exception $e) {
    die("keine Verbindung möglich: " . $e->getMessage());
}

/**
 * Create SQL
 */
$sql = "SELECT * FROM suche WHERE (Wohnort LIKE '" . $value . "')";

$sth = $conn->prepare($sql);
$sth->execute();

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    $a_json_row["value"] = $row['benutzername'];
    $a_json_row["typ"] = $row['fach'];
    $a_json_row["url"] = "/de/profile.php?username=" . $row['benutzername'];

    array_push($a_json, $a_json_row);
}
$a_json = array_unique($a_json, SORT_REGULAR);
$json = json_encode($a_json);
?>
<script type="text/javascript">
    var searchresults = <?php echo $json; ?>;
</script>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/location.html");       // Inkludiert den Inhalt
include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
