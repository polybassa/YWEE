<?php
    // Autor von ListDir.php: Daniel Tatzel
    // Liest alle Dateien aus und berechnet dazu die Groesse in KB und erzeugt ein JSON objekt

    //$Dir = '/users/private/'.$ID;
    $Dir = "./files";

    // Kann dann mit JSON in Javascript umgewandelt werden zur Verarbeitung ( Array )
    $FileListing = array_diff(scandir($Dir), array('..', '.'));

    //echo "Test";
    $file_arr = array();

    foreach ( $FileListing as $Files )
    {
        $temp = filesize($Files)/1024;
        if ( ($temp) != 0 )
        {
            $size = number_format( $temp, 2, ",", "." );
        }
        else
        {
            $size = $temp;
        }

        // Debug Info
        echo "<a href=".$Dir."/".$Files.">".$Files."</a> &nbsp;".$size." KB<br>";

        // Array fuer JSON Objekt
        $file_arr[] = array("name" => $Files, "size" => $size);
    }
    echo "<br><br>";
    // Debug Information
    print_r($file_arr);

    echo "<br><br>";

    // JSON Ausgabe
    echo json_encode( $file_arr );
?>
