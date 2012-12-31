<?php

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $path = './uploads/' . basename($_FILES['file']['Cover']);
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
}

$con = mysql_connect("79.125.112.237","submitoutside","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mixtapes", $con);

$sql="INSERT INTO tapes (Name, Playlist, Cover)
VALUES
('$_POST[Name]','$_POST[Playlist]','$_POST[Cover]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
echo "1 record added";

mysql_close($con);




?>