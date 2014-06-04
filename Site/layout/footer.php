    </article> <!-- ID: Content -->
	</section> <!--ehemals wrapper-->
    
    <footer>
		<?php
		if ( $_SESSION['sprache'] == "en" )
        { ?> 	
		<div id="cssmenu">		
				
				<ul>
					<li><a href="/en/termsandconditions.php"><span>Terms and Conditions</span></a></li>
					<li><a href="/en/sitenotice.php"><span>Site notice</span></a></li>
				</ul>
		</div>
		<?php
		}
        else
        { ?>
		<div id="cssmenu">
				<ul>
					<li><a href="/de/agb.php"><span>AGB</span></a></li>
					<li><a href="/de/impressum.php"><span>Impressum</span></a></li>
				</ul>
		
		</div>
		<?php
		}
        ?>
		
		</div>
	</footer>

</div> <!-- ID: Container -->
</body>
</html>
