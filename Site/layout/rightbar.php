<div id="right">
    
	<?php
   //: von Matthias Birnthaler
   if ( !isset( $_SESSION['logged-in'] ) )
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<div class="basic-wrapper-top">
						Sign in </div>';      
            }
            else
            {
                echo '<div class="basic-wrapper-top">
						Anmeldung</div>';
			}
        }
        else
        {
           if ( $_SESSION['sprache'] == "en" )
			{
			echo '<div class="basic-wrapper-top">
						Log out </div>'; 
			}
			else 
			{
			echo '<div class="basic-wrapper-top">
						Abmelden </div>';
			}
		}

	?>
	
	
	
	<div class="basic-wrapper-bottom">
	<?php
        // Autoren: Daniel Tatzel (PHP)
        // Gibt entsprechendes Formular aus, je nachdem, ob der Nutzer angemeldet ist oder nicht

        echo '<form method="POST" action="#" id="loginform">
            <input type="hidden" name="PHPSESSID" value="'.session_id().'">';

        if ( !isset( $_SESSION['logged-in'] ) )
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="text" name="username" placeholder="Username" id="startside_field">
                    <input type="password" name="passwd" placeholder="Password" id="startside_field">
                    <input type="submit" name="login" value="Login">';
                echo ' or <a href="/en/registration.php">register</a>';
            }
            else
            {
                echo '<input type="text" name="username" placeholder="Benutzername" id="startside_field">
                    <input type="password" name="passwd" placeholder="Passwort" id="startside_field">
                    <input type="submit" name="login" value="Anmelden">';
                echo ' oder <a href="/de/registrierung.php">Registrieren</a>';
            }
        }
        else
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="submit" name="logout" value="Logout">';
            }
            else
            {
                echo '<input type="submit" name="logout" value="Abmelden">';
            }
            
        }

        echo '</form>';


        // Debug Information
        //echo "Session: ".session_id()."<br>";
    ?>
	</div>
    
     <br>
	
    <!-- Suchformular --><!--Sprachabfrage nicht nötig, da Button-->
    <div class="basic-wrapper orange">
    <form method="POST" action="/de/search.php" id="searchform">

    <input type="hidden" name="PHPSESSID" value="'.session_id().'">
    <input type="hidden" name="valueTyp" value="#">
    <?php
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="text" name="search" placeholder="Search" id="starteside_suchen">';
            }
            else
            {
                echo '<input type="text" name="search" placeholder="Suche" id="starteside_suchen">';
            }
    ?>
    <input type="image" src="/images/lupe.png" alt="Search">
    </form>
    </div>
	
	 <br>
	
	
	
	<!----------Block for Map by Matthias Birnthaler ----------------->
	<?php
	
	if ( $_SESSION['sprache'] == "en" )
            {
                echo '<div class="basic-wrapper-top">
						Map </div>';      
            }
            else
            {
                echo '<div class="basic-wrapper-top">
						Karte</div>';
			}
	?>
	 
	<div class="basic-wrapper-bottom">
	<img src="/images/placeholder_map.jpg"><!--wollt was testn-->
	</div>
	 <br>
	
	
	<!----------Block for Film by Matthias Birnthaler ----------------->
	<?php
	// von Matthias Birnthaler (Video zu Film übersetzen.... irgendwie witzlos)
	if ( $_SESSION['sprache'] == "en" )
            {
                echo '<div class="basic-wrapper-top">
						Video </div>';      
            }
            else
            {
                echo '<div class="basic-wrapper-top">
						Film</div>';
			}
	?>	
	<div class="basic-wrapper-bottom">
	<img src="/images/placeholder_video.jpg"><!--wollt was testn-->
	</div>
	 <br>
	
	
</div><!--right-->


<div id="content" class="basic-wrapper">
