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
'<form method="POST">
  <div class="modal-body">
  <div class="form-group">
    <label for="recipient-name" class="control-label">Пароль:</label>
    <input class="form-control" id="password" type="password">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="control-label">Повторите пароль:</label>
    <input class="form-control" id="repeat_password" type="password">
  </div>
</div>
<input type="submit" id="restore" style="margin-top: 10px;" value="Востановить" class="btn btn-primary registration"></input>
</form>');

$parse->tpl_parse();

$result = $parse->template;
