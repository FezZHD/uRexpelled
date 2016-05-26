<?php

include_once('printFunctions.php');

$queryResult = printTopTable("SELECT * FROM login ORDER BY counter DESC");

include_once('parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'  <li><a href="index.php">Домашняя страница</a></li>
  <li><a href="faq.php">FAQ</a></li>
  <li class="active"><a href="top.php">Наши "лучшие клиенты"</a></li>
  <li><a href="story.php">Охеренные истории</a></li>
');

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
'    <h1>"Страшная" таблица</h1>
    <span class="h1_comment">Если Вы попали сюда, то прощайте!</span>

    <div class="table_bg">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>ФИО</th>
            <th>Количество попыток отчисления</th>
          </tr>
        </thead>
        <tbody>
          '.$queryResult.'
        </tbody>
      </table>
    </div>
');

$parse->tpl_parse();

$result = $parse->template;
