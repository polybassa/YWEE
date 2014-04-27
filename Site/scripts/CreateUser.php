<?php
    // Autor von CreateUser.php: Daniel Tatzel
    // Erstellt einen neuen Benutzer in der Datenbank
    if ( $_POST['username'] != 'Benutzername')
    {
        // Baue Verbindung auf
        $dbConnection = ConnectToDB();
            
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        $query = $dbConnection->prepare("insert into mitglieder (benutzername, geschlecht, vorname, nachname, geburtsdatum, wohnort, strasse, hausnummer, hnrzusatz, email, telefon, handy, sprache, rolle) VALUES (:user, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);");
        $query->bindParam(":user",$_POST['username']);
        $query->execute();
        
        $query = $dbConnection->prepare("insert into login (benutzername, passwort, rolle) VALUES ( :user, :pass, 0)");
        $query->bindParam(":user",$_POST['username']);
        $query->bindParam(":pass", md5( $_POST['passwd'] ) );
        $query->execute();

        // Profildaten fehlen noch
        // ...
    }
?>
