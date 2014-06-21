<?php
/* Passwortaenderung fuer den Privaten Ordner -- Daniel Tatzel */

/* create_htpasswd: Generiert eine .htpasswd Datei mit Benutzername und Passwort fuer den Login zum Privaten Ordner */
    $DIR = $_SERVER["DOCUMENT_ROOT"] . "/test_02/private/";
    if ( file_exists($DIR . '.htpasswd') )
        unlink($DIR.'.htpasswd');

    $passwd = crypt($_POST['passwd']);
    $htpasswd = 'admin:' . $passwd . "\n";

    $stream = "# Autor: Daniel Tatzel\n\n".$htpasswd;

    $handle = fopen($DIR . '.htpasswd',"a");
    fputs($handle,$stream);
    fclose($handle);

    header("Location: http://www.ebenezer-kunatse.net/private/");
?>
