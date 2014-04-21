<div id="right">
    <p>
    Rechter Balken! (200 Pixel)<br>
    <br>
    Login<br>
    Suche<br>
    Map
    <br>
    <br>
    Nur mal damit was da steht :D<br><br>
    <?php
        // Autor des PHP-Abschnitts: Daniel Tatzel
        echo "Session-ID: ".session_id()."<br>";
        echo "counter-ip: ".$_SESSION['counter_ip']."<br>";
        echo "Logged-in: ".$_SESSION['logged-in']."<br>";
        
        if ( !isset( $_SESSION['logged-in'] ) )
        {
            echo '<form method="POST" action="">
                <input type="text" name="username" value="Benutzername">
                <input type="password" name="passwd" value="Passwort">
                <input type="hidden" name="PHPSESSID" value="'.session_id().'">
                <input type="submit" name="login" value="Login">
            </form>';
        }
        else
        {
            echo '<form method="POST" action="">
                <input type="hidden" name="PHPSESSID" value="'.session_id().'">
                <input type="submit" name="logout" value="Logout">
            </form>';
        }
    ?>
    
    <br>
    <form method="POST" action="index.php">
        <input type="text" name="search" value="Suche">
        <input type="submit" name="search" value="Suchen">
    </form>
    </p>
</div>	

<div id="content">
