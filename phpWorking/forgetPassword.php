<?php
echo $_POST['email'];
if(isset($_POST['email']))
{

  $host = 'localhost';
  $database = 'site';
  $user = 'root';
  $pswd = '';

  @$db = mysql_connect($host,$user,$pswd);
  mysql_select_db($database);

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER SET 'utf8'");
  mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
  $email = htmlspecialchars(addslashes($_POST['email']));
  $query = "SELECT * FROM login WHERE email='$email'";
  $result = mysql_query($query);
  if(!$result)
  {
    die(mysql_error());
  }
  if (@mysql_num_rows($result) !== 0)
  {
    $randomInt = rand(0,10000000);
    $array = mysql_fetch_array($result);
    $restoreId = md5($array['name'].$array['login'].$array['password'].$randomInt);
    $query = "INSERT INTO restore_table (email,restore_id) VALUES ('$email','$restoreId')";
    $result = mysql_query($query);
    if(!$result)
    {
      die(mysql_error());
    }
    mysql_close($db);
    //mail($email,'Востановление пароля','urexpelled.hol.es?id='.$restore_id);
    exit(header('Location: ../index.php'));
  }
}
else
{
  exit(header('Location: ../forgotPassword.php'));
}
