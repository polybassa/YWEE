<?php
    // Jede Funktion muss dann evtl noch in ein extra Script-Datei ausgelagert werden wegen AJAX, au&szlig;er man kann funktionen aufrufen

    // Autor von GetCounterValue(): Daniel Tatzel
    // Holt sich den aktuellen Wert des Counters aus der DB mittels PDO und gibt ihn zurueck
    function GetCounterValue()
    {
        // Baue Verbindung auf
        $dbConnection = ConnectToDB();
        
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        $query = $dbConnection->prepare("select * from Counter;");
        $query->execute();

        $result = $query->fetch(PDO::FETCH_LAZY);

        return $result["number"];
    }

    // Autor von GetCounterValue(): Daniel Tatzel
    // Erzeugt einen neuen Nutzer mit Passwort
    function CreateUser()   // Momentan fuer Testzwecke
    {
        // Baue Verbindung auf
        $dbConnection = ConnectToDB();
        
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        $query = $dbConnection->prepare("insert into login (username, passwd) values (:user,:pass)");
        $query->bindParam(":user",$_POST['username']);
        $query->bindParam(":pass", md5( $_POST['passwd'] ) );
        $query->execute();

        // Profildaten fehlen noch
        // ...

        return true;
    }

    // Autor von Login(): Daniel Tatzel
    // Prueft ob der Benutzer die richtigen Anmeldedaten eingegeben hat beim Login oder ob er sich abmelden will
    function Login()    // Das selbe wie in Login.php
    {

        if ( !isset( $_SESSION['logged-in'] ) && isset($_POST['login'] ) )
        {
            // Baue Verbindung auf
            $dbConnection = ConnectToDB();
            
            $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

            $query = $dbConnection->prepare("select * from login where username = :user and passwd = :pass");
            $query->bindParam(":user",$_POST['username']);
            $query->bindParam(":pass", md5( $_POST['passwd'] ) );
            $query->execute();

            $result = $query->fetch(PDO::FETCH_LAZY);
            
            if ( $query->rowCount() > 0 )  // Falls ein Eintrag vorhanden ist, dann war der Login erfolgreich
                $_SESSION['logged-in'] = true;  // Login auf True setzen

        }
        else if ( isset( $_SESSION['logged-in'] ) && isset($_POST['logout'] ) )
        {
            $_SESSION['logged-in'] = NULL;  // Login auf NULL setzen, damit es mit isset() funktioniert
        }

        return true;
    }
?>
