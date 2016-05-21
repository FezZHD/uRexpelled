<?php

include_once('phpWorking/printFunctions.php');
$result = printFaq("SELECT * FROM faq");


require('phpWorking/parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'<li><a href="index.php">Домашняя страница</a></li>
<li class="active"><a href="faq.php">FAQ</a></li>
<li><a href="top.php">Наши "лучшие клиенты"</a></li>
<li><a href="story.php">Охеренные истории</a></li>');

$parse->set_tpl('{CONTENT}',
'  <h1>Вопросы для аутистов:</h1>
  <span class="h1_comment">Если у тебя есть вопрос, то нам как-то пофиг... </span>
  <section>'
  .$result.'
  </section>
');

$parse->tpl_parse();

print $parse->template;
