<?php
/*
 * author: Nils Weiss
 * script to display all tutors for a given subject 
 * 
 */

// Anpassung und Aufteilung des Layouts: Daniel Tatzel
// Muss in der Reihenfolge bleiben
// Inkludiert die Session
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");
// Inkludiert die Verbindung zur Datenbank
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");

// Hole Übergabeparameter
$value = trim($_GET['term']);

// Name der Seite die im Browser angezeigt werden soll
$titel = 'Tutoren die ' . $value . ' unterrichten';

// Inkludiert den Header
include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");

$_SESSION['sprache'] = "de";

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
// establish database connection
try {
    $conn = ConnectToDB();
} catch (Exception $e) {
    die("keine Verbindung möglich: " . $e->getMessage());
}

// create sql query
$sql = "SELECT * FROM suche WHERE (fach LIKE '" . $value . "%')";

// execute sql query
$sth = $conn->prepare($sql);
$sth->execute();

//iterate throw results and fill output array
while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    $a_json_row["value"] = $row['benutzername'];
    $a_json_row["typ"] = $row['Wohnort'];
    $a_json_row["url"] = "/de/profile.php?username=" . $row['benutzername'];

    array_push($a_json, $a_json_row);
}
// remove multiple entries
$a_json = array_unique($a_json, SORT_REGULAR);
$json = json_encode($a_json);
?>
<script type="text/javascript">
    // print out all search results in an json object to use it later in an other script
    var searchresults = <?php echo $json; ?>;
</script>
<?php
// Inkludiert den Inhalt
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/subject.html");
// Inkludiert den Footer
include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php");
?>
