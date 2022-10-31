<?php
date_default_timezone_set("Asia/Dhaka");
$db = new SQLite3("gamersInfo.sqlite");

$TODAY = date('Y-m-d');
if (!$db) {
  echo $db->lastErrorMsg();
}
$execQ = 'SELECT * FROM gamersInfo WHERE PLAY_DATE = "' . $TODAY . '" GROUP BY MOBILE ORDER BY max(GOAL) DESC, ID ASC LIMIT 10';
// $execQ = 'SELECT * FROM gamersInfo WHERE PLAY_DATE = "' . $TODAY . '" ORDER BY GOAL DESC, ID ASC LIMIT 10';
$ret = $db->query($execQ);
$jsonArr = [];

while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
  array_push($jsonArr, $row);
}
echo json_encode($jsonArr);

$db->close();
