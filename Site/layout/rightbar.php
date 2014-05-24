<div id="right">
    <p>
    Rechter Balken! (200 Pixel)</p>

    <?php
        // Autoren: Daniel Tatzel (PHP)
        // Gibt entsprechendes Formular aus, je nachdem, ob der Nutzer angemeldet ist oder nicht

        echo '<form method="POST" action="#" id="loginform">
            <input type="hidden" name="PHPSESSID" value="'.session_id().'">';

        if ( !isset( $_SESSION['logged-in'] ) )
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="text" name="username" placeholder="Username">
                    <input type="password" name="passwd" placeholder="Password">
                    <input type="submit" name="login" value="Login">';
                echo ' or <a href="/en/registration.php">register</a>';
            }
            else
            {
                echo '<input type="text" name="username" placeholder="Benutzername">
                    <input type="password" name="passwd" placeholder="Passwort">
                    <input type="submit" name="login" value="Login">';
                echo ' oder <a href="/de/registrierung.php">Registrieren</a>';
            }
        }
        else
        {
            echo '<input type="submit" name="logout" value="Logout">';
        }

        echo '</form>';


        // Debug Information
        /*
        echo '<p>';
        echo "Session: ".session_id()."<br>";            // Debug Info
        echo "Logged-in: ".$_SESSION['logged-in']."<br>";   // Debug Info
        echo '</p>';
        */
    ?>

    
    <br>

    <!-- Suchformular --> 
    <form method="POST" action="index.php">
    <?php
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="text" name="search" placeholder="Search">
                    <input type="submit" name="search" value="Search">';
            }
            else
            {
                echo '<input type="text" name="search" placeholder="Suche">
                    <input type="submit" name="search" value="Suchen">';
            }
    ?>
    </form>
    
    <br>
    <p>Map
    </p>
</div>	

<div id="content">
