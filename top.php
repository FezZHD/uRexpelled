<?php

include_once('phpWorking/printFunctions.php');

require('phpWorking/parse_class.php');

$result = printTopTable("SELECT * FROM login ORDER BY counter DESC");

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'  <li><a href="index.php">Домашняя страница</a></li>
  <li><a href="faq.php">FAQ</a></li>
  <li class="active"><a href="top.php">Наши "лучшие клиенты"</a></li>
  <li><a href="story.php">Охеренные истории</a></li>
');

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
          '.$result.'
        </tbody>
      </table>
    </div>
');

$parse->tpl_parse();

print $parse->template;
