<?php

include_once('phpWorking/printFunctions.php');

$result = printStory("SELECT* FROM stories ORDER BY rand() LIMIT 1");


require('phpWorking/parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'<li><a href="index.php">Домашняя страница</a></li>
<li><a href="faq.php">FAQ</a></li>
<li><a href="top.php">Наши "лучшие клиенты"</a></li>
<li class="active"><a href="story.php">Охеренные истории</a></li>
');

$parse->set_tpl('{CONTENT}',
'    <h1>Информация:</h1>
    <span class="h1_comment">Здесь вы можете увидеть истории от самых лучших наших подписчиков, которые у нас нет. Уже нет ;)</span>
    <div class="block">
      '.$result.'
    </div>

    <div class="generic_story_btn">
      <input type="button" class="btn btn-primary" onclick="document.location.reload()" value="Сгенерировать историю"/>
    </div>
    '
);

$parse->tpl_parse();

print $parse->template;
