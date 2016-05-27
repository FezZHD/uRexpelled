<?php

include_once('printFunctions.php');
$queryResult = printComments("SELECT * FROM comment_db");
include_once('parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
file_get_contents('templates/menuIndex.tpl')
);


session_start();
if(isset($_SESSION['isAuth']))
{
  $parse->set_tpl('{LOGIN}',
  file_get_contents('templates/auth.tpl'));
  if($_SESSION['isAdmin'] == 1)
  {
    $queryResult = printWithDeleteComments("SELECT * FROM comment_db");
  }
}
else
{
  $parse->set_tpl('{LOGIN}',
  file_get_contents('templates/login.tpl'));
}

$parse->set_tpl('{CONTENT}',
str_replace('{RESULT}',$queryResult,file_get_contents('templates/startContent.tpl')));


$parse->tpl_parse();

$result = $parse->template;
