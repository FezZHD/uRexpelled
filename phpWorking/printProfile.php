<?php

include_once('phpWorking/printFunctions.php');

session_start();

if (isset($_SESSION['ID']))
{
    $currentId = $_SESSION['ID'];
    $result = printProfile("SELECT * FROM login WHERE ID = '$currentId'");

    include_once('phpWorking/parse_class.php');

    $parse->get_tpl('templates/template.tpl');

    $parse->set_tpl('{MENU_SELECTED}',
  file_get_contents('templates/menuStock.tpl')
    );

    $parse->set_tpl('{LOGIN}',
    file_get_contents('templates/login.tpl'));

    $parse->set_tpl('{CONTENT}',
    $result);

    $parse->tpl_parse();

    $result =  $parse->template;
}
else
{
  exit(header('Location: ../index.php'));
}
