<?php
    // Autor von delete.php: Daniel Tatzel
    // L&oescht eine Datei

    $path = realpath('files/'.$_POST['file']);

    if( is_file($path) )
        unlink( $path );
?> 
