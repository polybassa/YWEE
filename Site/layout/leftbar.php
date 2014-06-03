<section> <!--ehemals wrapper--> 

<aside id="left">

    <noscript>
        <br><b>Sie haben Javascript nicht aktiviert. Aktivieren sie Javascript um unsere Seite im vollen Umfang nutzen zu k&ouml;nnen!</b><br>
    </noscript>
    
    <?php
        /* Grundgeruest fuer Sprachauswahl
        if ( $_SESSION['sprache'] == "en" )
            echo "Englisch";
        else
            echo "Deutsch";
        */
        
        
        echo "<br>";
        
        if ( $_SESSION['admin'] == true )
        {
            echo "Counter: ";
            include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/GetCounterValue.php"); // Inkludiert die Counter Abfrage
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
    <p id="data"></p>

	<script type="text/javascript" src="/js/topguestbook.js"></script>	
	
</aside>
