<?php
    // Autor von login.php: Daniel Tatzel
    // Prueft ob der Benutzer die richtigen Anmeldedaten eingegeben hat beim Login oder ob er sich abmelden will

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert Session
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB

    if ( !isset( $_SESSION['logged-in'] ) /*&& isset($_POST['login'] )*/ )
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

            $query2 = $dbConnection->prepare("select sprache from mitglieder where benutzername = :user");
            $query2->bindParam(":user", $result["benutzername"]);
            $query2->execute();

            $result2 = $query->fetch(PDO::FETCH_LAZY);

            $_SESSION['sprache'] = $result2["sprache"];
            
            echo 'Sie sind angemeldet!';
        }
        else
            echo 'Anmeldung Fehlgeschlagen!';

    }
    else if ( isset( $_SESSION['logged-in'] ) )
    {
        $_SESSION['logged-in'] = NULL;  // Login auf NULL setzen, damit es mit isset() funktioniert
        if ( $_SESSION['admin'] == true )
            $_SESSION['admin'] = NULL;      // Admin Status zur&uuml;cksetzen
        echo "Sie sind abgemeldet";
    }
    
    if ( isset($_POST['register'] ) )
        include_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/CreateUser.php");       // Inkludiert das CreateUser Script
?>
