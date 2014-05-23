    <div id="nav" >
        <?php
        if ( $_SESSION['sprache'] == "en" )
        { ?>
            Navigation: Home News Company Contakt <br>
            Current Links: <a href="/en/index.php">Home</a> &nbsp; &nbsp; <a href="/en/sitenotice.php">Site notice</a> &nbsp; &nbsp; <a href="/en/registration.php">Registration</a>
        <?php
        }
        else
        { ?>
            Navigation: Home News Unternehmen Kontakt <br>
            Links zu aktuellen Seiten: <a href="/de/index.php">Startseite</a> &nbsp; &nbsp; <a href="/de/impressum.php">Impressum</a> &nbsp; &nbsp; <a href="/de/registrierung.php">Registrierung</a> 
            
        <?php
        }
            ?>
    </div>
