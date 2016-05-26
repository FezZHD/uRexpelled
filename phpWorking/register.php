<?php

$host = 'localhost';
$database = 'site';
$user = 'root';
$pswd = '';//for unix insert to here your password;

@$db = mysql_connect($host,$user,$pswd);

mysql_select_db($database);

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");


if ( (trim($_POST['name']) !== '') && (trim($_POST['login']) !== '') && (trim($_POST['email']) !== '') && (trim($_POST['password']) !== '') && (trim($_POST['repeat_password']) !== '') )
{
  $name = htmlspecialchars(addslashes(trim($_POST['name'])));
  $login = htmlspecialchars(addslashes(strtolower(trim($_POST['login']))));
  $email = htmlspecialchars(addslashes(strtolower(trim($_POST['email']))));
  $password = md5(md5(htmlspecialchars(addslashes(trim($_POST['password'])))));
  $repeat_password = md5(md5(htmlspecialchars(addslashes(trim($_POST['repeat_password'])))));

  $checkQuery = "SELECT * FROM login WHERE
  login='$login' OR
  email='$email'";

  $checkResult = mysql_query($checkQuery);

  if(@mysql_num_rows($checkResult) === 0)
  {
      if(($password === $repeat_password) && (filter_var($email, FILTER_VALIDATE_EMAIL)))
      {
        if (($_FILES['profileAvatarUpload']['size']) !== 0)
        {
          $fileName = $_FILES['profileAvatarUpload']['name'];
          copy($_FILES['profileAvatarUpload']['tmp_name'],"../media/$fileName.jpg");
          $image = addslashes("../media/$fileName.jpg");
        }
        else
        {
          $image = NULL;
        }
        $counter = 0;
        $isAdmin = 0;

        $query = "INSERT INTO login (login,email,password,name,counter,image,isAdmin) VALUES ('$login','$email','$password','$name','$counter','$image','$isAdmin')";

        mysql_query($query);
        mysql_close($db);
        $header = header("Location: ../index.php");
        exit($header);
      }
      else
      {
        mysql_close($db);
        exit(header("Location: ../registration.php"));
      }

    }
    else
    {
        mysql_close($db);
        exit(header("Location: ../registration.php"));
    }

}
else
{
    mysql_close($db);
    exit(header("Location: ../registration.php"));
}
