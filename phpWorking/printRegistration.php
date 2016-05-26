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
'<form action="phpWorking/register.php" enctype="multipart/form-data"  method="POST">
  <div class="modal-body">
  <div class="form-group">
    <label for="recipient-name" class="control-label">Ваше имя:</label>
    <input type="text" class="form-control" name="name">
  </div>
      <div class="form-group">
        <label for="recipient-name" class="control-label">Логин:</label>
        <input type="text" class="form-control" name="login">
      </div>
      <div class="form-group">
        <label for="recipient-name" class="control-label">Ваша почта:</label>
        <input type="text" class="form-control" name="email">
      </div>
      <div class="form-group">
        <label for="recipient-name" class="control-label">Пароль:</label>
        <input class="form-control" name="password" type="password">
      </div>
      <div class="form-group">
        <label for="recipient-name" class="control-label">Повторите пароль:</label>
        <input class="form-control" name="repeat_password" type="password">
      </div>
  </div>
  <input type="file" name="profileAvatarUpload" value="Добавить аватар" accept="image/*" сlass="btn btn-primary"></input>
  <input type="submit" id="registration" style="margin-top: 10px;" value="Зарегистрировать"  class="btn btn-primary"></input>
  </form>');

$parse->tpl_parse();

$result = $parse->template;
