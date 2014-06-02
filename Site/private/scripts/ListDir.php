<?php
    // Autor von ListDir.php: Daniel Tatzel
    // Liest alle Dateien aus und berechnet dazu die Groesse in KB und erzeugt ein JSON objekt

    //$Dir = '/users/private/'.$ID;
    $Dir = "./files/";

    // Kann dann mit JSON in Javascript umgewandelt werden zur Verarbeitung ( Array )
    $FileListing = array_diff(scandir($Dir), array('..', '.'));

    if ( count( $FileListing ) > 0 )
    {
        $file_arr = array();
        
        foreach ( $FileListing as $File )
        {
            $size = number_format( filesize($Dir.$File)/1024, 2, ",", "." );

            // Array fuer JSON Objekt
            $file_arr[] = array("name" => $File, "size" => $size);
        }

        // JSON Ausgabe
        echo json_encode( $file_arr );
    }
?>
