    <div id="nav" >
        <?php
        $forwardto = basename( $_SERVER['PHP_SELF'] );

        $deflag = "/images/de.png";
        $enflag = "/images/en.png";
        
        if ( $_SESSION['sprache'] == "en" )
        { ?>
            Navigation: Home News Company Contakt Guestbook Search AGB(?)<br>
            Current Links:
            <a href="/en/index.php">Home</a> &nbsp; &nbsp;
            <a href="/en/news.php">News</a> &nbsp; &nbsp;
            <a href="/en/sitenotice.php">Site notice</a> &nbsp; &nbsp;
            <a href="/en/registration.php">Registration</a>
        <?php
            echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'"></a> &nbsp; <a href="/en/'.$forwardto.'"><img src="'.$enflag.'"></a>';
        }
        else
        { ?>
            Navigation: Home News Unternehmen Kontakt G&auml;stebuch Suche AGB<br>
            Links zu aktuellen Seiten:
            <a href="/de/index.php">Startseite</a> &nbsp; &nbsp;
            <a href="/de/nachrichten.php">Nachrichten</a> &nbsp; &nbsp;
            <a href="/de/impressum.php">Impressum</a> &nbsp; &nbsp;
            <a href="/de/registrierung.php">Registrierung</a>
        <?php
            echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'"></a> &nbsp; <a href="/en/'.$forwardto.'"><img src="'.$enflag.'"></a>';
        }
        ?>
            
    </div>
