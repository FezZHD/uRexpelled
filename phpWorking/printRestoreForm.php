<?php

include_once('parse_class.php');
include_once('newPassword.php');
$parse->get_tpl('templates/template.tpl');


$parse->set_tpl('{MENU_SELECTED}',
file_get_contents('templates/menuStock.tpl'));

$parse->set_tpl('{LOGIN}',
 file_get_contents('templates/login.tpl'));


$parse->set_tpl('{CONTENT}',
'<form action="phpWorking/restorePassword.php?id='.$id.'" method="POST">
  <div class="modal-body">
  <div class="form-group">
    <label for="recipient-name" class="control-label">Пароль:</label>
    <input class="form-control" name="password" type="password">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="control-label">Повторите пароль:</label>
    <input class="form-control" name="repeat_password" type="password">
  </div>
</div>
<input type="submit" id="restore" style="margin-top: 10px;" value="Востановить" class="btn btn-primary"></input>
</form>');

$parse->tpl_parse();

$result = $parse->template;
