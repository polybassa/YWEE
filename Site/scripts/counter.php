<?php
    // Autor des Sessionbasierten Counters: Daniel Tatzel
    session_set_cookie_params(10800);   // Cookie bleibt 3 Stunden aktiv
    session_start();                    // Initialisiert die Session

    // Prueft ob die Session-Variable "counter_ip" gesetzt ist, wenn nicht, dann wird der Counter um 1 erhoeht
    if ( !isset( $_SESSION['counter_ip'] ) )
    {
        $_SESSION['counter_ip'] = true;

        // Baue Verbindung auf
        $dbConnection = ConnectToDB();
        
        // Set the case in which to return column_names.
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        $query = $dbConnection->prepare("update Counter set number = number + 1");
        $query->execute();
    }

?> 
