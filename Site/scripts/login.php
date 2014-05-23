<?php
    // Autor von login.php: Daniel Tatzel
    // Prueft ob der Benutzer die richtigen Anmeldedaten eingegeben hat beim Login oder ob er sich abmelden will

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert Session
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB

    if ( !isset( $_SESSION['logged-in'] ) )
    {
        // Baue Verbindung auf
        $dbConnection = ConnectToDB();
        
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        $query = $dbConnection->prepare("select * from login where benutzername = :user and passwort = :pass");
        $query->bindParam(":user",$_POST['username']);
        $query->bindParam(":pass", md5( $_POST['passwd'] ) );
        $query->execute();

        $result = $query->fetch(PDO::FETCH_LAZY);
        
        if ( $query->rowCount() > 0 )  // Falls ein Eintrag vorhanden ist, dann war der Login erfolgreich
        {
            $_SESSION['logged-in'] = true;  // Login auf True setzen

            $_SESSION['user'] = $result["benutzername"];  // Benutzername in die Session schreiben

            if ( $result["rolle"] == 1 )
                $_SESSION['admin'] = true;
        }
        else
        {
            if ( $_SESSION['sprache'] == "de")
                echo 'Anmeldung Fehlgeschlagen!';
            else
                echo 'Login failed!';
        }

        $dbConnection = null;

    }
    else if ( isset( $_SESSION['logged-in'] ) )
    {
        unset( $_SESSION['logged-in'] );    // Login auf NULL setzen, damit es mit isset() funktioniert
        unset( $_SESSION['user'] );
        
        if ( $_SESSION['admin'] == true )
            unset( $_SESSION['admin'] );      // Admin Status zur&uuml;cksetzen
    }
    
    if ( isset($_POST['register'] ) )
        include_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/CreateUser.php");       // Inkludiert das CreateUser Script
?>
