<?php

/*
	 * author: Nils Weiss
	 * script for intelligent searchfunction 
	 * 
	 */
include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");

$typ = trim($_POST['valueTyp']);
$value = trim($_POST['search']);

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
if ($typ === 'location')
    $sql = "SELECT * FROM suche WHERE (Wohnort LIKE '" . $value . "%')";
else if ($typ === 'subject')
    $sql = "SELECT * FROM suche WHERE (fach LIKE '" . $value . "%')";
else
    $sql = "SELECT * FROM suche WHERE (Wohnort LIKE '" . $value . "%') or (fach LIKE '" . $value . "%')";

$sth = $conn->prepare($sql);
$sth->execute();

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    if (stristr($row['Wohnort'], $value)) {
        $a_json_row["value"] = $row['Wohnort'];
        $a_json_row["typ"] = "Ort";
        $a_json_row["url"] = "location.php?term=" . $row['Wohnort'];
        array_push($a_json, $a_json_row);
    }
    if (stristr($row['fach'], $value)) {
        $a_json_row["value"] = $row['fach'];
        $a_json_row["typ"] = "Fach";
        $a_json_row["url"] = "subject.php?term=" . $row['fach'];
        array_push($a_json, $a_json_row);
    }
}
$a_json = array_unique($a_json, SORT_REGULAR);
$json = json_encode($a_json);

if (count($a_json) === 1) {
    if ($a_json[0]['typ'] == "Ort") {
        $id = $a_json[0]['value'];
        header("Location: http://ebenezer-kunatse.net/de/location.php?term=$id");
        exit;
        //include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/search.html");// Inkludiert den Inhalt
    } else if ($a_json[0]['typ'] == "Fach") {
        $id = $a_json[0]['value'];
        header("Location: http://ebenezer-kunatse.net/de/subject.php?term=$id");
        exit;
    }
} else {
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session

    $titel = "Suchergebnisse"; // Name der Seite die im Browser angezeigt werden soll

    $_SESSION['sprache'] = "de";

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    ?>
    <script type="text/javascript">
        var searchresults = <?php echo $json; ?>;
    </script>
    <?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/search.html");       // Inkludiert den Inhalt
}
include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
