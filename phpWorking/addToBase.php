<?php

$host = 'localhost';
$database = 'site';
$user = 'root';
$pswd = '';//for unix insert to here your password;

$userName = htmlspecialchars(addslashes($_POST['userName']));
$message = htmlspecialchars(addslashes($_POST['userMessage']));
$date = date("Y-m-d");

$db = mysql_connect($host,$user,$pswd);

mysql_select_db($database);

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

$query  = "INSERT INTO comment_db (user_name, comment_text, date_add) VALUES ('$userName', '$message', '$date')";


$result = mysql_query($query);

if (!$result)
{
  die(mysql_error());
}


mysql_close($db);
exit(header("Location: ../index.php"));
