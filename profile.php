<?php

require('phpWorking/parse_class.php');

$parse->get_tpl('templates/template.tpl');

$parse->set_tpl('{MENU_SELECTED}',
'<li><a href="index.html">Домашняя страница</a></li>
<li><a href="faq.html">FAQ</a></li>
<li><a href="top.html">Наши "лучшие клиенты"</a></li>
<li><a href="story.html">Охеренные истории</a></li>'
);

$parse->set_tpl('{CONTENT}',
'  <div class="profil_photo">
    <img src="media/logo_icon/15636061.jpg" alt="NAVI" title="NAVI" />
  </div>
  <div class="profil_block">
    <div class="profil_title">
      Иванов Иван Иванович
    </div>
    <div class="profil_block_descr">
      <div class="profil_descr_item">
        <span class="profil_descr_title">Количество подач заявлений: </span>
        <span class="profil_descr_message">15</span>
      </div>
    </div>
  </div>
');

$parse->tpl_parse();

echo $parse->template;
