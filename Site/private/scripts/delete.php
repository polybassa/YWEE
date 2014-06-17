<?php
    // Autor von delete.php: Daniel Tatzel
    // Loescht eine Datei

    $path = realpath('files/'.$_POST['file']);

    // Wenn vorhanden, dann l&oeschen
    if( is_file($path) )
        unlink( $path );
?> 
