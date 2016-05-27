<?php

include_once('printFunctions.php');

$queryResult = printTopTable("SELECT * FROM login ORDER BY counter DESC");

include_once('parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
file_get_contents('templates/menuTop.tpl'));

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
'<h1>"Страшная" таблица</h1>
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
 </div>');


$parse->tpl_parse();

$result = $parse->template;
