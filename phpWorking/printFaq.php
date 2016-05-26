<?php


include_once('printFunctions.php');

$queryResult = printFaq("SELECT * FROM faq");

include_once('parse_class.php');


$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'<li><a href="index.php">Домашняя страница</a></li>
<li class="active"><a href="faq.php">FAQ</a></li>
<li><a href="top.php">Наши "лучшие клиенты"</a></li>
<li><a href="story.php">Охеренные истории</a></li>');

session_start();
if(isset($_SESSION['isAuth']))
{
  $parse->set_tpl('{LOGIN}',
'<div class="top_login_icon"><a href="profile.php"><i class="fa fa-user"></i></a></div>');
}
else
{
  $parse->set_tpl('{LOGIN}',
  file_get_contents('templates/login.tpl'));
}

$parse->set_tpl('{CONTENT}',
'  <h1>Вопросы для аутистов:</h1>
  <span class="h1_comment">Если у тебя есть вопрос, то нам как-то пофиг... </span>
  <section>'
  .$queryResult.'
  </section>
');

$parse->tpl_parse();

$result = $parse->template;
