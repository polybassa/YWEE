<?php
    // Autor von login.php: Daniel Tatzel
    // Prueft ob der Benutzer die richtigen Anmeldedaten eingegeben hat beim Login oder ob er sich abmelden will

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert Session
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB

    if ( !isset( $_SESSION['logged-in'] ) )
    {
        // Baue Verbindung auf
        try {
            $dbConnection = ConnectToDB();
        } catch (Exception $e) {
            die("keine Verbindung möglich: " . $e->getMessage());
        }

        // SECURITY HOLE ***************************************************************
        // allow space, any unicode letter and digit, underscore and dash
        if ( preg_match("/[^\040\pL\pN_-]/u", $_POST['username']) || preg_match("/[^\040\pL\pN_-]/u", $_POST['passwd']) ) {
            exit;
        }
        
        // replace multiple spaces with one
        $user = preg_replace('/\s+/', ' ', $_POST['username']);
        $passwd = preg_replace('/\s+/', ' ', $_POST['passwd']);
    
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        $query = $dbConnection->prepare("select * from login where benutzername = :user and passwort = :pass");
        $query->bindParam(":user", $user);
        $query->bindParam(":pass", md5( $passwd ) );
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
        unset( $_SESSION['logged-in'] );    // Login zuruecksetzen
        unset( $_SESSION['user'] );
        
        if ( $_SESSION['admin'] == true )
            unset( $_SESSION['admin'] );      // Admin Status zuruecksetzen
    }
?>
