<?php
$name = false;
$message = false;

if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
}
if(isset($_REQUEST['message'])){
    $message = $_REQUEST['message'];
}


$dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");

$allSensorInfo = $dbConn->prepare("SELECT `name`, `comment`, `post_time` from `comments`");
$result = $allSensorInfo->execute(array());

// Manually create my custom JSON string for all my front-end users of this php file.
$jsonStrArr = [];
while($thisRow = $allSensorInfo->fetch(PDO::FETCH_ASSOC)){
    $jsonStrRow = "{";
    $jsonStrRow .= "\"name\":\"" . $thisRow['name'] . "\"";
    $jsonStrRow .= ", \"message\":\"" . $thisRow['comment'] . "\"";
    $jsonStrRow .= ", \"comment\":\"" . $thisRow['comment'] . "\"";
    $jsonStrRow .= ", \"timestamp\":\"" . $thisRow['post_time'] . "\"";
    $jsonStrRow .= "}";
    $jsonStrArr[] = $jsonStrRow;
}
$jsonStr = "[" . implode(", ", $jsonStrArr) . "]";

// This is the quick and dirty -- but the front end must know the table column names, which
// is not always flexible -- if you change the column names, you now have to change things
// in this file, as well as ANY front end file(s) which uses this JSON object.
//$jsonStr = json_encode($allSensorInfo->fetchAll(PDO::FETCH_ASSOC));
echo($jsonStr);

?>