<?php
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

  if ($_FILES["file"]["error"] > 0) {
    echo "Fehler Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    if (file_exists("/test_02/private/files/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " bereits vorhanden. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "/test_02/private/files/" . $_FILES["file"]["name"]);
    }
  }
?> 
