<?php


include_once('parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
file_get_contents('templates/menuStock.tpl'));

$parse->set_tpl('{LOGIN}',
file_get_contents('templates/login.tpl'));


$parse->set_tpl('{CONTENT}',
file_get_contents('templates/registrationContent.tpl'));

$parse->tpl_parse();

$result = $parse->template;
