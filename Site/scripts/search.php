<?php
	//Tobias Schwindl
	//Skript für die Suche (nicht fertig!)
	
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
	
	/*types für Ort und/oder Tutor
	Wenn der type auf 1 gesetzt ist, wird in der view nach Einträgen gesucht, die dann ausgegeben werden
	Es können sowohl nur keiner, einer der beiden oder Beide auf 1 gesetzt sein!
	*/
	$type_ort = 1;
	$type_tutor = 1;
	
	$_POST['suche'] = "Ingolstadt";
	//Funktion um SQL Injection zu verhindern
	mysql_real_escape_string($_POST['suche']);
	
	$result_orte = array();
	$result_tutor = array();
	
	//SQL Querry vorbereiten und ausführen
	if($type_ort)
	{
		$sth = $dbConnection->prepare("SELECT * FROM suche WHERE (Wohnort LIKE '" . $_POST['suche'] . "%')");
		$sth->execute();
		while($row = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$result_orte[] = $row;
		}
		
	}
	if($type_tutor)
	{
		$sth = $dbConnection->prepare("SELECT * FROM suche WHERE (fach LIKE '" . $_POST['suche'] . "%')");
		$sth->execute();
		while($row = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$result_tutor[] = $row;
		}
	}
	
	//print_r($result_orte);
	echo json_encode($result_orte);
	echo "<br>";
	//print_r($result_tutor);
	echo json_encode($result_tutor);
	echo "<br>";


?>