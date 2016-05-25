<?php

include_once('printFunctions.php');


$queryResult = printStory("SELECT* FROM stories ORDER BY rand() LIMIT 1");


include_once('parse_class.php');

$parse->get_tpl('templates/template.tpl');


$parse->set_tpl('{MENU_SELECTED}',
'<li><a href="index.php">Домашняя страница</a></li>
<li><a href="faq.php">FAQ</a></li>
<li><a href="top.php">Наши "лучшие клиенты"</a></li>
<li class="active"><a href="story.php">Охеренные истории</a></li>
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
  '  <div class="top_login_icon"  data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><i class="fa fa-user"></i></div>
    <div class="top_login_panel">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Авторизация</h4>
            </div>
            <form id="login" action="phpWorking/auth.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Логин:</label>
                  <input type="text" class="form-control" name="login">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Пароль:</label>
                  <input class="form-control" name="password" type="password">
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" id="forgetPassword" onclick="location.href='.'forgotPassword.php'.'" value="Забыли пароль" class="btn btn-default"/>
              <input type="submit" id="registration" onclick="location.href='.'registration.php'.'" class="btn btn-default" value="Регистрация"/>
              <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
              <input type="submit" id="loginAccept" value="Вход" form="login" class="btn btn-primary"/>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>');
}

$parse->set_tpl('{CONTENT}',
'    <h1>Информация:</h1>
    <span class="h1_comment">Здесь вы можете увидеть истории от самых лучших наших подписчиков, которые у нас нет. Уже нет ;)</span>
    <div class="block">
      '.$queryResult.'
    </div>

    <div class="generic_story_btn">
      <input type="button" class="btn btn-primary" onclick="document.location.reload()" value="Сгенерировать историю"/>
    </div>
    '
);

$parse->tpl_parse();

$result = $parse->template;
