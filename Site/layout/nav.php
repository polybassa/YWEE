    <div id="nav" >
        <?php
        $forwardto = basename( $_SERVER['PHP_SELF'] );

        $deflag = "/images/de.png";
        $enflag = "/images/en.png";
        
        if ( $_SESSION['sprache'] == "en" )
        { ?>
            Navigation: 	
			<a href="/en/index.php">Home</a>			
			<a href="/en/news.php">News</a>
			<a href="/en/corporate.php">Corporate</a>
			<a href="/en/contact.php">Contact</a>
			<a href="/en/guestbook.php">Guestbook</a>
			<a href="/en/search.php">Search</a>
            <a href="/en/termsandconditions.php">Terms and Conditions</a><br>
			Current Links:
            <a href="/en/index.php">Home</a> &nbsp; &nbsp;
            <a href="/en/news.php">News</a> &nbsp; &nbsp;
            <a href="/en/sitenotice.php">Site notice</a> &nbsp; &nbsp;
            <a href="/en/registration.php">Registration</a>
        <?php
            echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'" alt="DE-Flagge"></a> &nbsp; <a href="/en/'.$forwardto.'"><img src="'.$enflag.'" alt="GB-Flagge"></a>';
        }
        else
        { ?>
            Navigation: 
			<a href="/de/index.php">Home</a>			
			<a href="/de/news.php">News</a>
			<a href="/de/unternehmen.php">Unternehmen</a>
			<a href="/de/kontakt.php">Kontakt</a>
			<a href="/de/gaestebuch.php">G&auml;stebuch</a>
			<a href="/de/suche.php">Suche</a>
            <a href="/de/agb.php">AGB</a><br>
            Links zu aktuellen Seiten:
            <a href="/de/index.php">Startseite</a> &nbsp; &nbsp;
            <a href="/de/nachrichten.php">Nachrichten</a> &nbsp; &nbsp;
            <a href="/de/impressum.php">Impressum</a> &nbsp; &nbsp;
            <a href="/de/registrierung.php">Registrierung</a>
        <?php
            echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'" alt="GER-Flag"></a> &nbsp; <a href="/en/'.$forwardto.'"><img src="'.$enflag.'" alt="GB-FLAG"></a>';
        }
        ?>
            
    </div>
