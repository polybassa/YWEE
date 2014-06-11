    </article> <!-- ID: Content -->
	</div> <!--wrapper-->
    
    <footer>
       
		<?php
		if ( $_SESSION['sprache'] == "en" )
        { ?> 	
				<div class="footer_link">
					<ul>
						<li><a href="/en/termsandconditions.php">Terms and Conditions</a></li>
						<li><a href="/en/sitenotice.php">Site notice</a></li>
					</ul>
				</div>
				
		<?php
		}
        else
        { ?>
				<div class="footer_link">
					<ul>
					<li><a href="/de/agb.php">AGB</a></li>
					<li><a href="/de/impressum.php">Impressum</a></li>	
					</ul>
				</div>
				
		<?php
		}
        ?>
      
	</footer>

</div> <!-- ID: Container -->
</body>
</html>
