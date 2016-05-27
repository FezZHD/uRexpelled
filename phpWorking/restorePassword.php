<?php

$id = $_GET['id'];
$host = 'localhost';
$database = 'site';
$user = 'root';
$pswd = '';

@$db = mysql_connect($host,$user,$pswd);
mysql_select_db($database);

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

$password = md5(md5(htmlspecialchars(addslashes(trim($_POST['password'])))));
$repeat_password = md5(md5(htmlspecialchars(addslashes(trim($_POST['repeat_password'])))));

if ($password === $repeat_password)
{
  $query = "SELECT email FROM restore_table WHERE restore_id='$id'";
  $result = mysql_query($query);
  if(!$result)
  {
    die(mysql_error());
  }
  if (@mysql_num_rows($result) !== 0)
  {
    $row = mysql_fetch_row($result);
    $email = $row[0];
    $query = "UPDATE login SET password='$password' WHERE email='$email'";
    $result = mysql_query($query);
    if(!$result)
    {
      die(mysql_error());
    }
    $query = "DELETE FROM restore_table WHERE restore_id='$id'";
    $result = mysql_query($query);
    if(!$result)
    {
      die(mysql_error());
    }
    mysql_close($db);
    //mail($email,'Ваш новый пароль',$_POST['password']);
    exit(header('Location: ../index.php'));
  }
}
exit(header('Location: ../forgotPassword.php?id='.$id));
