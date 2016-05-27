<?php
if (isset($_GET['id']))
{
    $id=$_GET['id'];
include_once('phpWorking/printRestoreForm.php');

print $result;
}
else
{
  exit(header('Location: ../index.php'));
}
