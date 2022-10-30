<?php
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, GET");
date_default_timezone_set("Asia/Dhaka");
$db = new SQLite3("gamersInfo.sqlite");



if($_POST){
  $sql ="CREATE TABLE if not exists gamersInfo (ID INTEGER PRIMARY KEY,GOAL INTEGER NOT NULL,NAME TEXT NOT NULL, AGE INTEGER NOT NULL, MOBILE CHAR(15) NOT NULL,PLAY_DATE TEXT NOT NULL)";

$ret = $db->exec($sql);
if(!$ret){
  echo $db->lastErrorMsg();
}

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$age = $_POST['age'];
$goal = $_POST['goal'];
$PLAY_DATE = date('Y-m-d');

$sql ="INSERT INTO gamersInfo (ID,NAME,MOBILE,AGE,GOAL,PLAY_DATE) VALUES (NULL,'$name', '$mobile', '$age','$goal','$PLAY_DATE')";

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
    $db->close();
      echo 'success';
      exit();
   }
   $db->close();
 }else{
   echo "get request";
 }

