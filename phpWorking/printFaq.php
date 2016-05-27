<?php


include_once('printFunctions.php');

$queryResult = printFaq("SELECT * FROM faq");

include_once('parse_class.php');


$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
file_get_contents('templates/menuFAQ.tpl'));

session_start();
if(isset($_SESSION['isAuth']))
{
  $parse->set_tpl('{LOGIN}',
  file_get_contents('templates/auth.tpl'));
}
else
{
  $parse->set_tpl('{LOGIN}',
  file_get_contents('templates/login.tpl'));
}

$parse->set_tpl('{CONTENT}',
str_replace('{RESULT}',$queryResult,file_get_contents('templates/faqContent.tpl')));

$parse->tpl_parse();

$result = $parse->template;
