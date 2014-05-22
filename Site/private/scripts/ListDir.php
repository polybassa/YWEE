<?php
    // Autor von ListDir.php: Daniel Tatzel
    // Liest alle Dateien aus und berechnet dazu die Groesse in KB und erzeugt ein JSON objekt

    //$Dir = '/users/private/'.$ID;
    $Dir = "./files";

    // Kann dann mit JSON in Javascript umgewandelt werden zur Verarbeitung ( Array )
    $FileListing = array_diff(scandir($Dir), array('..', '.'));

    if ( count( $FileListing ) > 0 )
    {
        $file_arr = array();
        
        foreach ( $FileListing as $File )
        {
            $temp = filesize($File)/1024;
            if ( ($temp) != 0 )
            {
                $size = number_format( $temp, 2, ",", "." );
            }
            else
            {
                $size = $temp;
            }

            // Debug Info
            echo "<a href=".$Dir."/".$File.">".$File."</a> &nbsp;".$size." KB ";
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="file" value="'.$File.'">';
            echo '<input type="submit" name="delete" value="L&ouml;schen">';
            echo '</form>';

            // Array fuer JSON Objekt
            $file_arr[] = array("name" => $File, "size" => $size);

            echo "<br><br>";

            // JSON Ausgabe
            //echo json_encode( $file_arr );
        }
    }
    else
    {
        echo "Keine Dateien vorhanden.";
    }
?>
