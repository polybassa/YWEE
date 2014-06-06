<div id="wrapper"> <!--ehemals wrapper--> 

<div id="left">

    <noscript>
        <br><b>Sie haben Javascript nicht aktiviert. Aktivieren sie Javascript um unsere Seite im vollen Umfang nutzen zu k&ouml;nnen!</b><br>
    </noscript>
    
    <?php
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
    <p id="databargb"></p>

	<script type="text/javascript" src="/js/topguestbook.js"></script>	
	<div class="basic-wrapper-bottom">link zu großem GB ? </div>
</div> <!-- left -->
