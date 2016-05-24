<?php

include_once('printFunctions.php');

if ((isset($_POST['name'])) && (isset($_POST['login'])) && (isset($_POST['email'])) && (isset($_POST['password'])) && (isset($_POST['repeat_password'])))
{
  $name = htmlspecialchars(addslashes(trim($_POST['name'])));
  $login = htmlspecialchars(addslashes(trim($_POST['login'])));
  $email = htmlspecialchars(addslashes(trim($_POST['email'])));
  $password = md5(md5(htmlspecialchars(addslashes(trim($_POST['password'])))));
  $repeat_password = md5(md5(htmlspecialchars(addslashes(trim($_POST['repeat_password'])))));

  if($password === $repeat_password)
  {
    if (!empty($_FILES['profileAvatarUpload']))
    {
      $image = addslashes(file_get_contents($_FILES['profileAvatarUpload']['tmp_name']));
    }
    else
    {
      $image = NULL;
    }
    //insert add code here
  }
  else
  {
    exit(header("Location: ../registration.php"));
  }

}
else
{
   exit(header("Location: ../registration.php"));
}
