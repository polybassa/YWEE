    <nav>
        <div class="cssmenu">
        <?php
        $forwardto = basename( $_SERVER['PHP_SELF'] );

        $deflag = "/images/de.png";
        $enflag = "/images/en.png";

        if ( $_SESSION['sprache'] == "en" )
        { ?> 	
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
					<li><a href="/en/donate.php"><span>Donation</span></a></li>
					<li><?php echo '<a href="/de/'.$forwardto.'"><img src="'.$deflag.'" alt="DE-Flagge"></a>'; ?> </li>		
				</ul>
		<?php
        }
        else
        { ?>
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
					<li><a href="/de/spenden.php"><span>Spenden</span></a></li>
					<li><?php echo'<a href="/en/'.$forwardto.'"><img src="'.$enflag.'" alt="GB-Flagge"></a>'; ?> </li>
				</ul>
		<?php
        }
        ?>
    </div>
</nav>
