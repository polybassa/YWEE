<div id="left">
    <p>
    Linker Balken! (200 Pixel)<br>
    <br>
    G&auml;stebuch<br>
    Benutzerz&auml;hler (nur Admin)<br>
    <br>
    <br>
    <?php
        if ( $titel == "Startseite" || $titel == "Homepage" )
        {
            echo "Counter: ";
            include_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/GetCounterValue.php"); // Inkludiert die Counter Abfrage
        }
    ?>
    </p>
</div>
