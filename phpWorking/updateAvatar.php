<?php

session_start();
$host = 'localhost';
$database = 'site';
$user = 'root';
$pswd = '';

@$db = mysql_connect($host,$user,$pswd);

mysql_select_db($database);

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

$id = $_SESSION['ID'];
$query = "SELECT image FROM login WHERE ID='$id'";

$result = mysql_query($query);
$row = mysql_fetch_row($result);
unlink($row[0]);

if (($_FILES['update']['size']) !== 0)
{

  $fileName = $_FILES['update']['name'];
  copy($_FILES['update']['tmp_name'],"../media/$fileName.jpg");
  $image = addslashes("../media/$fileName.jpg");
}
else
{
  $image = NULL;
}

$query = "UPDATE login SET image='$image' WHERE ID='$id'";
mysql_query($query);
mysql_close($db);


exit(header('Location: ../profile.php'));
