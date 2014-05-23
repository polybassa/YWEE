<div id="right">
    <p>
    Rechter Balken! (200 Pixel)</p>
    
    <?php
        // Autor des PHP-Abschnitts: Daniel Tatzel
        // Gibt entsprechendes Formular aus, je nachdem, ob der Nutzer angemeldet ist oder nicht

        echo '<form method="POST" action="#" id="loginform">';

        if ( !isset( $_SESSION['logged-in'] ) )
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="text" name="username" placeholder="Username">
                    <input type="password" name="passwd" placeholder="Password">
                    <input type="hidden" name="PHPSESSID" value="'.session_id().'">
                    <input type="submit" name="login" value="Login">
                    <input type="submit" name="register" value="Register">
                    </form>';
            }
            else
            {
                echo '<input type="text" name="username" placeholder="Benutzername">
                    <input type="password" name="passwd" placeholder="Passwort">
                    <input type="hidden" name="PHPSESSID" value="'.session_id().'">
                    <input type="submit" name="login" value="Login">
                    <input type="submit" name="register" value="Registrieren">
                    </form>';
            }
        }
        else
        {
            echo '<input type="hidden" name="PHPSESSID" value="'.session_id().'">
                <input type="submit" name="logout" value="Logout">
            </form>';
        }


        // Debug Information
        /*
        echo '<p>';
        echo "Session: ".session_id()."<br>";            // Debug Info
        echo "Logged-in: ".$_SESSION['logged-in']."<br>";   // Debug Info
        //echo '<div id="LoginStatus"></div>';
        echo '</p>';
        */
    ?>
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $("#loginform").submit(function(e)
        {
          e.preventDefault();
          $.post("scripts/login.php",$("#loginform").serialize(),function(msg) {alert(msg); window.location.reload();});
        });
      });
    </script>
    
    <br>

    <?php
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<form method="POST" action="index.php">
                    <input type="text" name="search" placeholder="Search">
                    <input type="submit" name="search" value="Search">
                    </form>';
            }
            else
            {
                echo '<form method="POST" action="index.php">
                    <input type="text" name="search" placeholder="Suche">
                    <input type="submit" name="search" value="Suchen">
                    </form>';
            }
    ?>
    <br>
    <p>Map
    </p>
</div>	

<div id="content">
