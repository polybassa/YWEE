<?php
    // Baue Verbindung auf
    $dbConnection = ConnectToDB();
        
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

    $query = $dbConnection->prepare("insert into login (username, passwd) values (:user,:pass)");
    $query->bindParam(":user",$_POST['username']);
    $query->bindParam(":pass", md5( $_POST['passwd'] ) );
    $query->execute();

    // Profildaten fehlen noch
    // ...
?>
