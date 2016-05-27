<?php

session_start();
if ((isset($_SESSION['isAdmin'])) && ($_SESSION['isAdmin'] == 1) && (isset($_GET['id'])))
{

    $host = 'localhost';
    $database = 'u269436194_site';
    $user = 'u269436194_root';
    $pswd = '13041996';

    @$db = mysql_connect($host,$user,$pswd);

    mysql_select_db($database);

    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET 'utf8'");
    mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
    $idComment = $_GET['id'];
    $query = "SELECT comment_id FROM comment_db WHERE comment_id='$idComment'";
    $result = mysql_query($query);
    if(mysql_num_rows($result) !== 0)
    {
      $query = "DELETE FROM comment_db WHERE comment_id='$idComment'";
      mysql_query($query);
    }
    mysql_close($db);
}
exit(header('Location: ../index.php'));
