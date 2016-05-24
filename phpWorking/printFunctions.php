<?php

$db = "";

function connectToSql()
{
  global $db;
  $host = 'localhost';
  $database = 'site';
  $user = 'root';
  $pswd = '3359';
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
        <span class="comment_delete"><a href="delete.php?id='.$row['comment_id'].'">Delete</a></span>
        <span class="comment_date">'.$row['date_add'].'</span>
      </div>
      <div class="comment_message">'
        .$row['comment_text'].'
      </div>
    </div>';
  }
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
  while($row = mysql_fetch_array($result))
  {
    $printString .= '<tr>
      <td>'.$index.'</td>
      <td>'.$row['name'].'</td>
      <td>'.$row['counter'].'</td>
    </tr>';

    $index++;
  }

  mysql_close($db);
  return $printString;
}
