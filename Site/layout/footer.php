    </article> <!-- ID: Content -->
	</div> <!--wrapper-->
    
    <footer>
        <div class="cssmenu">
		<?php
		if ( $_SESSION['sprache'] == "en" )
        { ?> 	
				<ul>
					<li><a href="/en/termsandconditions.php"><span>Terms and Conditions</span></a></li>
					<li><a href="/en/sitenotice.php"><span>Site notice</span></a></li>
				</ul>
		<?php
		}
        else
        { ?>
				<ul>
					<li><a href="/de/agb.php"><span>AGB</span></a></li>
					<li><a href="/de/impressum.php"><span>Impressum</span></a></li>
				</ul>
		<?php
		}
        ?>
        </div>
	</footer>

</div> <!-- ID: Container -->
</body>
</html>
