<?php
	//Tobias Schwindl
	//Skript für die Autocompletion bei der Suche (in Bearbeitung)
	
	//Verbindung aufbauen
	require "/ConToDB.php";
	try 
	{
		$dbConnection = ConnectToDB();
		echo "Verbindung hergestellt<br>";
	}
	catch(Exception $e)
	{
		die("keine Verbindung möglich: ".$e->getMessage());
	}

	//in der View suche nach dem vom HTTP Post bekommenden Vorschlag suchen 
	$_POST['suche'] = "in";
	//Funktion um SQL Injection zu verhindern
	mysql_real_escape_string($_POST['suche']);
	
	//SQL Querry vorbereiten und ausführen
	$sth = $dbConnection->prepare("SELECT * FROM suche WHERE (Wohnort LIKE '" . $_POST['suche'] . "%') or (fach LIKE '" . $_POST['suche'] . "%')");
	$sth->execute();
	$results = array();
	
	while($row = $sth->fetch(PDO::FETCH_ASSOC))
	{
		if(stristr($row['Wohnort'], $_POST['suche']))
		{
			$results[] = $row['Wohnort'].  ",Orte.php";
		}
		if(stristr($row['fach'], $_POST['suche']))
		{
			$results[] = $row['fach']. ",Tutoren.php";
		}
	}
	$result = array_unique($results);
	//echo json_encode($result);
	return json_encode($result);
?>
