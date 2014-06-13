    <nav>
        <div class="cssmenu">
        <?php
        $forwardto = basename( $_SERVER['PHP_SELF'] );

        if ( $_SESSION['sprache'] == "en" )
        { ?> 	
				<ul>
				
	
					<li><a href="/en/index.php"><span>Home</span></a></li>
					<li><a href="/en/news.php"><span>News</span></a></li>
					<li class="has-sub"><a><span>Corporate</span></a>
						<ul>
                            <li><a href="/en/corporate.php"><span>The Tutoren AG</span></a>
							<li><a href="/en/contact.php"><span>Contact</span></a></li>
							<li class="last"><a href="/en/guestbook.php"><span>Guestbook</span></a></li>
						</ul>
					</li>
					<li><a href="/en/donate.php"><span>Donation</span></a></li>
                    <?php
                        if ( $_SESSION['admin'] == true )
                        {
                            echo '<li><a href="/private/index.php"><span>Private folder</span></a></li>';
                        }

                        if ( $_SESSION['logged-in'] == true )
                        {
                            echo '<li><a href="/en/profile.php"><span>Profile</span></a></li>';
                        }
                    ?>
					<li><?php echo '<a href="/de/'.$forwardto.'"><img src="/images/de.png" class="flag_img" alt="DE-Flagge"></a>'; ?> </li>		
				</ul>
		<?php
        }
        else
        { ?>
				<ul>
				
					
					<li><a href="/de/index.php"><span>Home</span></a></li>
					<li><a href="/de/nachrichten.php"><span>Nachrichten</span></a></li>
					<li class="has-sub"><a><span>Unternehmen</span></a>
						<ul>
                            <li><a href="/de/unternehmen.php"><span>Die Tutoren AG</span></a>
							<li><a href="/de/kontakt.php"><span>Kontakt</span></a></li>
							<li><a href="/de/gaestebuch.php"><span>Gästebuch</span></a></li>
						</ul>
					</li>
					<li><a href="/de/spenden.php"><span>Spenden</span></a></li>
                    <?php
                        if ( $_SESSION['admin'] == true )
                        {
                            echo '<li><a href="/private/index.php"><span>Privater Ordner</span></a></li>';
                        }

                        if ( $_SESSION['logged-in'] == true )
                        {
                            echo '<li><a href="/de/profile.php"><span>Profil</span></a></li>';
                        }
                    ?>
					<li><?php echo'<a href="/en/'.$forwardto.'"><img src="/images/en.png" class="flag_img" alt="GB-Flagge"></a>'; ?> </li>
				</ul>
		<?php
        }
        ?>
    </div>

</nav>
