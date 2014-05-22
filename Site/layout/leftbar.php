<div id="left">
    <p>
    Linker Balken! (200 Pixel)<br>
    <br>
    G&auml;stebuch<br>
    <br>
    <br>
    <?php
        if ( $_SESSION['admin'] == true )
        {
            echo "Counter: ";
            include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/GetCounterValue.php"); // Inkludiert die Counter Abfrage
        }
    ?>
    </p>
</div>
