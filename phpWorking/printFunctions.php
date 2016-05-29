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
  $arrayReplace  = array('{USER}', '{DATE}', '{ID}', '{TEXT}');
  while ($row = mysql_fetch_array($result))
  {
    $arrayInfo = array($row['user_name'], $row['date_add'], $row['comment_id'], $row['comment_text']);
    $templateString = file_get_contents('templates/commentAdmin.tpl');
    $templateString = str_replace($arrayReplace, $arrayInfo, $templateString);
    $printString .=$templateString;
  }
  return $printString;
}


function printComments($query)
{
  global $db;
  $result = sendQuery($query);

  $printString = "";
  $arrayReplace  = array('{USER}', '{DATE}', '{TEXT}');
  while ($row = mysql_fetch_array($result))
  {
    $arrayInfo = array($row['user_name'], $row['date_add'], $row['comment_text']);
    $templateString = file_get_contents('templates/commentUser.tpl');
    $templateString = str_replace($arrayReplace, $arrayInfo, $templateString);
    $printString .=$templateString;
  }

  mysql_close($db);

  return $printString;
}


function printFaq($query)
{
  global $db;

  $result = sendQuery($query);
  $printString = "";
  $arrayReplace  = array('{QUESTION}', '{ANSWER}');
  while ($row = mysql_fetch_array($result))
  {
    $questionString = $row['ID'].'.'.$row['question'];
    $arrayInfo = array($questionString, $row['answer']);
    $templateString = file_get_contents('templates/faqTemplate.tpl');
    $templateString = str_replace($arrayReplace,$arrayInfo,$templateString);
    $printString .=$templateString;
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
  $arrayReplace  = array('{TITLE}', '{TEXT}');
  $arrayInfo = array($row['story_title'], $row['story_text']);
  $templateString = file_get_contents('templates/storyTemplate.tpl');
  $templateString = str_replace($arrayReplace, $arrayInfo, $templateString);
  $printString = $templateString;

    mysql_close($db);
    return $printString;
}


function printTopTable($query)
{
  global $db;

  $result = sendQuery($query);
  $index = 1;
  $printString = "";
  $arrayReplace  = array('{INDEX}', '{NAME}','{COUNT}');
  if (@mysql_num_rows($result) !== 0 )
  {
    while($row = mysql_fetch_array($result))
    {
      $arrayInfo = array($index, $row['name'], $row['counter']);
      $templateString = file_get_contents('templates/tableContent.tpl');
      $templateString = str_replace($arrayReplace,$arrayInfo,$templateString);
      $printString .= $templateString;
      $index++;
    }
  }
  else
  {
    $templateString = file_get_contents('templates/tableContent.tpl');
    $templateString = str_replace($arrayReplace,'none',$templateString);
    $printString = $templateString;
  }


  mysql_close($db);
  return $printString;
}


function printProfile($query)
{
  global $db;

  $result = sendQuery($query);
  $printString = "";
  $templateString = file_get_contents('templates/profileContent.tpl');
  $row = mysql_fetch_array($result,MYSQL_ASSOC);
  if ($row['image'] == NULL)
  {
    $row['image'] = 'media/default_avatar.png';
  }
  $arrayReplace  = array('{IMAGE}', '{NAME}', '{COUNT}');
  $arrayInfo = array($row['image'], $row['name'], $row['counter']);
  $templateString = str_replace($arrayReplace,$arrayInfo,$templateString);
  $printString = $templateString;
  mysql_close($db);

  return $printString;
}
