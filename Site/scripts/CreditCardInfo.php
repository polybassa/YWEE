<?php
	//Autor: Tobias Schwindl
	 include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");       // Inkludiert die Funktion zur Anmeldung an der DB
    // Baue Verbindung auf
    try 
	{
        $dbConnection = ConnectToDB();
    } catch (Exception $e)
	{
        die("keine Verbindung möglich: " . $e->getMessage());
    }
	
	// SECURITY HOLE ***************************************************************
    // allow space, any unicode letter and digit, underscore and dash
    if ( preg_match("/[^\040\pL\pN_-]/u", $_POST['kreditkartennummer']) || preg_match("/[^\040\pL\pN_-]/u", $_POST['pruefziffer']) || preg_match("/[^\040\pL\pN_-]/u", $_POST['betrag'])) {
        exit;
    }
    $_SESSION['user'] = admin;
    // replace multiple spaces with one
    $check_digits = preg_replace('/\s+/', ' ', $_POST['pruefziffer']);
	$creditcardNumber = preg_replace('/\s+/', ' ', $_POST['kreditkartennummer']);
	$sum = preg_replace('/\s+/', ' ', $_POST['betrag']);
    // Set the case in which to return column_names.
    $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
	
	$real_date = $_POST['jahr'] . "-" . $_POST['monat'] ."-31";	
	//print($real_date);
    $query = $dbConnection->prepare("insert into abrechnungen (benutzername, kreditkartennummer, ablaufdatum, pruefziffer, betrag) VALUES ( :user, :number, :date, :check, :sum)");

	$query->bindParam( ":user", $_SESSION['user'] );
	$query->bindParam( ":number", $creditcardNumber);
	$query->bindParam( ":date", $real_date);
	$query->bindParam( ":check", $check_digits);
	$query->bindParam( ":sum", $sum);
	
    
    $query->execute();
	
	//print_r($_POST);
	header("Location: http://ebenezer-kunatse.net/");
	$dbConnection = null;
?>