<?php
	/*
	 * author: Florian Laufenböck
	 */
	 include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
	
	try {
        $dbConnection = ConnectToDB();
    } catch (Exception $e) {
        die("keine Verbindung möglich: " . $e->getMessage());
    }
    
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    
    $query_leistungen = "INSERT INTO leistung VALUES('" . $_SESSION['user'] . "', '" . $fach . "', " . $stufe . ")";
    
    $que_leistungen = $dbConnection->prepare($query_leistungen);
    
    if(!$que_leistungen->execute())
    {
		print_r("unbekannter Datenbankfehler in tut_newfach.php");
	}
	
	$dbConnection = null;

?>
