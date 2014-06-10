<div id="wrapper"> <!--ehemals wrapper--> 

<div id="left">

    <?php
        if ( $_SESSION['admin'] == true )
        {
			// Admin-Menu by Alexander Strobl
            echo '<div class="basic-wrapper-top"> Admin-Menu </div>';
            echo '<div class="basic-wrapper-bottom center">';
			echo '<a href="/de/admin.php"><span>Admin-Verwaltung</span></a>';
            
            echo '</div>';
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<div class="basic-wrapper-top"> Visitor counter </div>';   
            }
            else
            {
                echo '<div class="basic-wrapper-top"> Besucherz&auml;hler </div>';
            }
            
            echo '<div class="basic-wrapper-bottom center">';
            include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/GetCounterValue.php"); // Inkludiert die Counter Abfrage
            echo '</div>';			
        }
    ?>
	<!--Block for Guestbook by Matthias Birnthaler-->
	<?php
	
	if ( $_SESSION['sprache'] == "en" )
	{
		echo '<div class="basic-wrapper-top">
				Guestbook </div>';      
	}
	else
	{
		echo '<div class="basic-wrapper-top">
				Gästebuch</div>';
	}
	?>
	<!-- Input by Alexander Strobl -->
    <p id="databargb"></p>

	<script type="text/javascript" src="/js/topguestbook.js"></script>	
	<?php
	
	if ( $_SESSION['sprache'] == "en" )
	{
		echo '<div class="basic-wrapper-bottom"><div class="button"><a href="/en/guestbook.php">show all</a></div></div>';      
	}
	else
	{
		echo '<div class="basic-wrapper-bottom"><div class="button"><a href="/de/gaestebuch.php">zeige alle</a></div></div>';
	}
	?>
	
	
	
</div> <!-- left -->

    
