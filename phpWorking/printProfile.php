<?php

include_once('phpWorking/printFunctions.php');

session_start();

$currentId = $_SESSION['ID'];
$result = printProfile("SELECT * FROM login WHERE ID = '$currentId'");

include_once('phpWorking/parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'<li><a href="index.php">Домашняя страница</a></li>
<li><a href="faq.php">FAQ</a></li>
<li><a href="top.php">Наши "лучшие клиенты"</a></li>
<li><a href="story.php">Охеренные истории</a></li>'
);

$parse->set_tpl('{LOGIN}',
'<div class="top_login_icon"><a href="profile.php"><i class="fa fa-user"></i></a></div>');

$parse->set_tpl('{CONTENT}',
$result);

$parse->tpl_parse();

$result =  $parse->template;
