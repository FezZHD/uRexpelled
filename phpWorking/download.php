<?php

if(file_exists('../download/form.docx'));
{
       session_start();
       $file= '../download/form.docx';
       header('Content-Description: File Transfer');
       header('Content-Type: application/octet-binary');
       header('Content-Disposition: attachment; filename='.$file);
       header('Content-Transfer-Encoding: binary');
       header('Expires: 0');
       header('Cache-Control: must-revalidate');
       header('Pragma: public');
       header('Content-Length: ' . filesize($file));
       $openedFile = fopen($file, 'rb');
       fpassthru($openedFile);

      if (isset($_SESSION['isAuth']))
      {
        $host = 'localhost';
        $database = 'site';
        $user = 'root';
        $pswd = '';

        @$db = mysql_connect($host,$user,$pswd);

        mysql_select_db($database);
        $currentId = $_SESSION['ID'];
        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER SET 'utf8'");
        mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

        $query = "UPDATE login SET counter=counter+1
        WHERE ID=$currentId";

        mysql_query($query);
        mysql_close($db);
      }
}
