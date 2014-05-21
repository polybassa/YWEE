<?php
/* Dateien in einem Ordner anzeigen ( Grundidee / getestet ) -- Daniel Tatzel */

//$Dir = '/users/private/'.$ID;
$Dir = "./files";

// Kann dann mit JSON in Javascript umgewandelt werden zur Verarbeitung ( Array )
$FileListing = array_diff(scandir($Dir), array('..', '.'));
            
// JSON Ausgabe
//echo json_encode( $FileListing );

//echo "Test";
foreach ( $FileListing as $Files )
    echo "<a href=".$Dir."/".$Files.">".$Files."</a><br>";
?>
