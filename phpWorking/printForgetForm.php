<?php

include_once('parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'<li><a href="index.php">Домашняя страница</a></li>
<li><a href="faq.php">FAQ</a></li>
<li><a href="top.php">Наши "лучшие клиенты"</a></li>
<li><a href="story.php">Охеренные истории</a></li>');

$parse->set_tpl('{LOGIN}',
file_get_contents('templates/login.tpl'));

$parse->set_tpl('{CONTENT}',
file_get_contents('templates/forgetContent.tpl'));


$parse->tpl_parse();

$result = $parse->template;
