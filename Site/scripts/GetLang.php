<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert Session

    if ( $_SESSION['sprache'] == "en" )
        echo  $_SESSION['sprache'];
?>
