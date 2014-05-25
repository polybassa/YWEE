<?php
	/*
	 * author: Florian Laufenböck
	 * sript: to edit the password and take a new
	 */
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	
	if(isset($_SESSION['user']))
	{
		// first: connection to DB
        include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/ConToDB.php");
        $dbConnection = ConnectToDB();     
        $dbConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);	
        
        $query = $dbConnection->prepare("select passwort from login where benutzername = '" . $_SESSION['user'] . "'");
        if($query->execute())
        {
			$pw_from_DB = $query->fetchAll(PDO::FETCH_ASSOC);
			if($pw_from_DB[0]["passwort"] != md5($_POST["oldPW"]))
			{
				$result = false;
				return $result;
			}
			else // the old password was submitted right
			{
				$query = "UPDATE login SET passwort=?";
				$que = $dbConnection->prepare($query);
				$que->execute(array(md5($_POST["newPW"])));  
				$result = true;
				return $result;
			}
		}
	}
	
?>
	
