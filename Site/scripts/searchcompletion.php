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
	//Die View suche anzeigen lassen
	/*
	$sql = 'SELECT * FROM suche WHERE 1';
	foreach ($dbConnection->query($sql) as $row)
	{
		echo $row['benutzername']."\t";
		echo $row['Wohnort']."\t";
		echo $row['umkreis']."\t";
		echo $row['stundenlohn']."\t";
		echo $row['bewertung']."\t";
		echo $row['fach']."\t";
		echo $row['stufen']."\t";
		echo "<br>";
	}
	*/
	//in der View suche nach dem vom HTTP Post bekommenden Vorschlag suchen 
	$_POST['suche'] = "i";
	//print_r($_POST);
	//Funktion um SQL Injection zu verhindern
	mysql_real_escape_string($_POST['suche']);
	//print_r($_POST);
	//SQL Querry vorbereiten und ausführen
	$sth = $dbConnection->prepare("SELECT * FROM suche WHERE (benutzername LIKE '" . $_POST['suche'] . "%') or (Wohnort LIKE '" . $_POST['suche'] . "%') or (umkreis LIKE '" . $_POST['suche'] . "%') or (stundenlohn LIKE '" . $_POST['suche'] . "%') or (bewertung LIKE '" . $_POST['suche'] . "%') or (fach LIKE '" . $_POST['suche'] . "%') or (stufen LIKE '" . $_POST['suche'] . "%')");
	$sth->execute();
	//Ergebnisse in das Ergebnis Array speichern und als JSON formatiert zurückgeben.
	$result = $sth->fetch(PDO::FETCH_ASSOC);
	$result_as_array = array($result);
	while($result)
	{
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		array_push($result_as_array,$result);
	}
	//print_r($result_as_array);
	//echo json_encode($result_as_array);
	return json_encode($result_as_array);
?>
