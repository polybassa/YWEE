<?php
    // Autor von login.php: Daniel Tatzel
    // Prueft ob der Benutzer die richtigen Anmeldedaten eingegeben hat beim Login oder ob er sich abmelden will
    if ( !isset( $_SESSION['logged-in'] ) && isset($_POST['login'] ) )
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

            if ( $result["rolle"] == 1 )
                $_SESSION['admin'] = true;
        }

    }
    else if ( isset( $_SESSION['logged-in'] ) && isset($_POST['logout'] ) )
    {
        $_SESSION['logged-in'] = NULL;  // Login auf NULL setzen, damit es mit isset() funktioniert
    }
    
    if ( isset($_POST['register'] ) )
        include_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/CreateUser.php");       // Inkludiert das CreateUser Script
?>
