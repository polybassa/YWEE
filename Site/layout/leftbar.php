<div id="left">

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
        
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ReadTopGuestbook.php");       // Inkludiert die Top Gaestebucheintraege
        
        echo "<br>";
        
        if ( $_SESSION['admin'] == true )
        {
            echo "Counter: ";
            include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/GetCounterValue.php"); // Inkludiert die Counter Abfrage
        }
    ?>
    </p>
</div>
