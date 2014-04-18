<?php
/* Automatische Generierung des Privaten Ordners (getestet) -- Daniel Tatzel */


/* create_htaccess: Generiert eine .htaccess Datei fuer den Login zum Privaten Ordner */

function create_htaccess($username, $authName, $passwdFile="")
{

    if (!is_dir($passwdFile))
        mkdir($passwdFile, 0700);

    $access =    'AuthType Basic' . "\n";
    $access .=    'AuthName "' . $authName . '"' . "\n";
    $access .=    'AuthUserFile ' . $passwdFile . '/.htpasswd' . "\n";
    $access .=    'require user ' . $username . "\n";
    
    $handle = fopen($passwdFile . '/.htaccess',"w");
    fputs($handle,$access);
    fclose($handle);

}

/* create_htpasswd: Generiert eine .htpasswd Datei mit Benutzername und Passwort fuer den Login zum Privaten Ordner */

function create_htpasswd($username, $passwd, $passwdFile="")
{
    if ( file_exists($passwdFile . '/.htpasswd') )
        unlink($passwdFile . '/.htpasswd');
    
    //if(empty($passwdFile))
    //    $passwdFile=dirname(__FILE__);
        
    $passwd = crypt($passwd);
    $htpasswd = $username . ':' . $passwd . "\n";
    
    $handle = fopen($passwdFile . '/.htpasswd',"a");
    fputs($handle,$htpasswd);
    fclose($handle);
    
}

// ID unter dem der Nutzer des Privaten Ordner bekannt ist
$ID = 'Aus Datenbbank holen';

// Benutzername
$username = 'YWEE_Gr2';

// Passwort
$passwd = 'TopSecret';

// Login Text
$authName = 'Privater Ordner Login';

// Pfad zum privaten Ordner
$passwdFile = '/users/private/'.$ID;



create_htaccess($username, $authName, $passwdFile);
create_htpasswd($username, $passwd, $passwdFile);
?>
