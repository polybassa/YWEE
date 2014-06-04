    <nav>
        <?php
        $forwardto = basename( $_SERVER['PHP_SELF'] );

        $deflag = "/images/de.png";
        $enflag = "/images/en.png";
        
        if ( $_SESSION['sprache'] == "en" )
        { ?> 	
			<div id="cssmenu">		
				
				<ul>
					<li class="responsive has-sub"><a><span>Menu</span></a></li>
					
					<li><a href="/en/index.php"><span>Home</span></a></li>
					<li><a href="/en/news.php"><span>News</span></a></li>
					<li class="has-sub"><a><span>Corporate</span></a>
						<ul>
							<li><a href="/en/contact.php"><span>Contact</span></a></li>
							<li class="last"><a href="/en/guestbook.php"><span>Guestbook</span></a></li>
						</ul>
					</li>
					<li><a href="/en/search.php"><span>Search<span></a></li>
					<li><?php echo'<a href="/en/'.$forwardto.'"><img src="'.$enflag.'" alt="GB-Flagge"></a>'; ?> </li>
					<li><?php echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'" alt="DE-Flagge"></a>'; ?> </li>
						
										
				</ul>
			</div>
			
			
			
			<!--
            <a href="/en/termsandconditions.php">Terms and Conditions</a><br>
			Current Links:
            <a href="/en/index.php">Home</a> &nbsp; &nbsp;
            <a href="/en/news.php">News</a> &nbsp; &nbsp;
            <a href="/en/sitenotice.php">Site notice</a> &nbsp; &nbsp;
            <a href="/en/registration.php">Registration</a>
			-->
		<?php
            //echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'" alt="DE-Flagge"></a>  <a href="/en/'.$forwardto.'"><img src="'.$enflag.'" alt="GB-Flagge"></a>';
        }
        else
        { ?>
            <div id="cssmenu">		
				
				<ul>
					<li class="responsive has-sub"><a><span>Menü</span></a></li>
					
					<li><a href="/de/index.php"><span>Home</span></a></li>
					<li><a href="/de/nachrichten.php"><span>Nachrichten</span></a></li>
					<li class="has-sub"><a><span>Unternehmen</span></a>
						<ul>
							<li><a href="/de/kontakt.php"><span>Kontakt</span></a></li>
							<li class="last"><a href="/de/gaestebuch.php"><span>Gästebuch</span></a></li>
						</ul>
					</li>
					<li><a href="/de/suche.php"><span>Suche</span></a></li>
					<li><?php echo'<a href="/en/'.$forwardto.'"><img src="'.$enflag.'" alt="GB-Flagge"></a>'; ?> </li>
					<li><?php echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'" alt="DE-Flagge"></a>'; ?> </li>
						
						
						
					
					
				</ul>
			</div>
			
			<!--
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
        -->
		<?php
            //echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'" alt="GER-Flag"></a> &nbsp; <a href="/en/'.$forwardto.'"><img src="'.$enflag.'" alt="GB-FLAG"></a>';
        }
        ?>
            
    </nav>
