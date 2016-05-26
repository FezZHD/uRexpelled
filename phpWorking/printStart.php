<?php

include_once('printFunctions.php');
$queryResult = printComments("SELECT * FROM comment_db");
include_once('parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'<li class="active"><a href="index.php">Домашняя страница</a></li>
 <li><a href="faq.php">FAQ</a></li>
 <li><a href="top.php">Наши "лучшие клиенты"</a></li>
 <li><a href="story.php">Охеренные истории</a></li>'
);


session_start();
if(isset($_SESSION['isAuth']))
{
  $parse->set_tpl('{LOGIN}',
'<div class="top_login_icon"><a href="profile.php"><i class="fa fa-user"></i></a></div>');
  if($_SESSION['isAdmin'] == 1)
  {
    $queryResult = printWithDeleteComments("SELECT * FROM comment_db");
  }
}
else
{
  $parse->set_tpl('{LOGIN}',
  file_get_contents('templates/login.tpl'));
}

$parse->set_tpl('{CONTENT}',
'<h1>Добро пожаловать в Ад</h1>
<span class="h1_comment">Если тебя отправили сюда, значит в деканате от вас хотят избавится. </span>
<article>
  <div class="page_article">
    <p>Этот сайт поможет тебе побыстрее всё сделать, чтобы все были довольны.</p>
    <p>Итак, тебе нужна будет чёртова форма, чтобы заполнить её и с улыбкой принести в деканат.Форму ты найдёшь <a href="phpWorking/download.php">здесь</a>.</p>
    <p>После того, как ты заполнишь форму, ты берёшь её и идёшь в деканат, отдаёшь и сваливаешь нахер с универа, чтобы тебя никто не видел.</p>
    <p>Но чтобы ты сидел не без дела, вот тебе <a href="http://rabotavmcdonalds.by/ru/vacancy.html"> анкета в мак</a>. Заполняешь и идёшь довольный работать.</p>
    <p>P.S. Если ты - девушка, то не забудь купить НОРМАЛЬНУЮ СЕТОЧКУ, ЧТОБЫ ТВОИ ВОЛОСЫ НЕ БЫЛИ В МОЁМ БИГМАКЕ !!!111!!!!1!</p>
  </div>
</article>
<div id="comment">
  <div class="comment_blocks">'
  .$queryResult.'
  </div>
  <div class="comment_entry">
    <div class="comment_icon"><img src="media/default_avatar.png"/></div>
    <div class="comment_form">
      <div class="comment_form_title">Комментарии:</div>
      <form action="phpWorking/addToBase.php" method="POST">
        <div class="comment_line"><input name="userName" type="text" placeholder="Name" class="form_element_text input_text comment_input" /></div>
        <div class="comment_line"><textarea name="userMessage" class="form_element_text comment_textarea form_textarea" placeholder="Message"></textarea></div>
        <div class="comment_line comment_button">
          <div class="col_com col-md-6"><input type="submit" class="btn btn-primary" id="send_form" name="send" value="Отправить"/></div>
        </div>
      </form>
    </div>
    </div>
</div>
</div>');


$parse->tpl_parse();

$result = $parse->template;
