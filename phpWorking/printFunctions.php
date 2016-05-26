<?php

$db = "";

function connectToSql()
{
  global $db;
  $host = 'localhost';
  $database = 'site';
  $user = 'root';
  $pswd = '';
  @$db = mysql_connect($host,$user,$pswd);

  mysql_select_db($database);

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER SET 'utf8'");
  mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

  return $db;
}


function sendQuery($query)
{
  global $db;
  $db = connectToSql();

  $result = mysql_query($query);

  return $result;
}


function closeDb()
{
  global $db;
  mysql_close($db);
}


function printWithDeleteComments($query)
{
  global $db;
  $result = sendQuery($query);

  $printString = "";
  while ($row = mysql_fetch_array($result))
  {
    $printString .='<div class="comment_block">
      <div class="comment_title">
        <span class="comment_name">'.$row['user_name'].'</span>
        <span class="comment_delete"><a href="phpWorking/delete.php?id='.$row['comment_id'].'">Delete</a></span>
        <span class="comment_date">'.$row['date_add'].'</span>
      </div>
      <div class="comment_message">'
        .$row['comment_text'].'
      </div>
    </div>';
  }
  return $printString;
}


function printComments($query)
{
  global $db;
  $result = sendQuery($query);

  $printString = "";
  while ($row = mysql_fetch_array($result))
  {

    $printString .='<div class="comment_block">
      <div class="comment_title">
        <span class="comment_name">'.$row['user_name'].'</span>
        <span class="comment_date">'.$row['date_add'].'</span>
      </div>
      <div class="comment_message">'
        .$row['comment_text'].'
      </div>
    </div>';
  }

  mysql_close($db);

  return $printString;
}


function printFaq($query)
{
  global $db;

  $result = sendQuery($query);
  $printString = "";
  while ($row = mysql_fetch_array($result))
  {
    $questionString = $row['ID'].'.'.$row['question'];

    $printString .='<div class="quest_block">
      <div class="quest">'.$questionString.'</div>
      <div class="answer">
        <p>'.$row['answer'].'</p>
      </div>
    </div>';
  }

  mysql_close($db);
  return $printString;
}


function printStory($query)
{
  global $db;

  $result = sendQuery($query);

  $printString = "";

  $row = mysql_fetch_array($result);

  $printString =   '<div class="block_title">'
      .$row['story_title'].'
    </div>
    <div class="block_message">
      <p>
      '.$row['story_text'].'
      </p>
    </div>';

    mysql_close($db);
    return $printString;
}


function printTopTable($query)
{
  global $db;

  $result = sendQuery($query);
  $index = 1;
  $printString = "";
  if (@mysql_num_rows($result) !== 0 )
  {
    while($row = mysql_fetch_array($result))
    {
      $printString .= '<tr>
        <td>'.$index.'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['counter'].'</td>
      </tr>';

      $index++;
    }
  }
  else
  {
    $printString = '<tr>
      <td>none</td>
      <td>none</td>
      <td>none</td>
    </tr>';
  }


  mysql_close($db);
  return $printString;
}


function printProfile($query)
{
  global $db;

  $result = sendQuery($query);
  $printString = "";

  $row = mysql_fetch_array($result,MYSQL_ASSOC);
  if ($row['image'] == NULL)
  {
    $row['image'] = 'media/default_avatar.png';
  }
  $printString = ' <div class="profil_photo">
    <form action="phpWorking/workProfile.php" enctype="multipart/form-data" method="POST">
      <img src="'.$row['image'].'" style="margin-bottom: 10px" alt="NAVI" title="NAVI" />
      <input type="file" id="profileAvatarUpdate" value="Добавить аватар" accept="image/*" сlass="btn btn-primary"></input>
      <input type="submit" name="updateAvatar" style="margin-top: 10px;" value="Обновить аватар"  class="btn btn-primary"></input>
      <input type="submit" name="logout" style="margin-top: 10px;" value="Выйти" class="btn btn-default"/>
    </div>
    <div class="profil_block">
      <div class="profil_title">'
      .$row['name'].'
      </div>
      <div class="profil_block_descr">
        <div class="profil_descr_item">
          <span class="profil_descr_title">Количество подач заявлений: </span>
          <span class="profil_descr_message">'.$row['counter'].'</span>
        </div>
      </div>
    </div>';
    mysql_close($db);

    return $printString;
}
