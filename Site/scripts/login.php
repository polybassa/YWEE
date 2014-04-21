<?php
    // Autor: Daniel Tatzel
    // Grob getestet
    
    if ( !isset( $_SESSION['logged-in'] ) && isset($_POST['login'] ) )
    {
        // Vorerst auskommentiert, da die DB noch nicht existiert

        //include("ConToDB.php");
        // Datenbank Ueberpruefung ob Passwort korrekt ist muss noch eingebaut werden
        
        // Baue Verbindung auf
        $dbConnection = ConnectToDB();
        
        // Set the case in which to return column_names.
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        $query = $dbConnection->prepare("select * from login where username = :user");
        $query->bindParam(":user",$_POST['username']);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_LAZY);
        
        if ( $query->rowCount() > 0 && $result["passwd"] == $_POST['passwd'] )  // $_POST['passwd'] muss noch verschluesselt werden
            $_SESSION['logged-in'] = true;  // Login auf True setzen

    }
    else if ( isset( $_SESSION['logged-in'] ) && isset($_POST['logout'] ) )
    {
        $_SESSION['logged-in'] = NULL;  // Login auf NULL setzen
    }
?>
