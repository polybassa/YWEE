<div id="right">
    <p>
    Rechter Balken! (200 Pixel)</p>
    <?php
        // Autor des PHP-Abschnitts: Daniel Tatzel
        // Gibt entsprechendes Formular aus, je nachdem, ob der Nutzer angemeldet ist oder nicht

        if ( $StatusCodeError)
            echo '<form method="POST" action="index.php">';
        else
            echo '<form method="POST" action="">';
            
        if ( !isset( $_SESSION['logged-in'] ) )
        {
            echo '<input type="text" name="username" value="Benutzername">
                <input type="password" name="passwd" value="Passwort">
                <input type="hidden" name="PHPSESSID" value="'.session_id().'">
                <input type="submit" name="login" value="Login">
                <input type="submit" name="register" value="Registrieren">
                </form>';
        }
        else
        {
            echo '<input type="hidden" name="PHPSESSID" value="'.session_id().'">
                <input type="submit" name="logout" value="Logout">
            </form>';
        }
        
        // Debug Information
        echo '<p>';
        echo "Session: ".session_id()."<br>";            // Debug Info
        echo "counter-ip: ".$_SESSION['counter_ip']."<br>"; // Debug Info
        echo "Logged-in: ".$_SESSION['logged-in']."<br>";   // Debug Info
        //echo '<div id="LoginStatus"></div>';
        echo '</p>';
    ?>
    <br>
    <form method="POST" action="index.php">
        <input type="text" name="search" value="Suche">
        <input type="submit" name="search" value="Suchen">
    </form>
    <br>
    <p>Map
    </p>
</div>	

<div id="content">
