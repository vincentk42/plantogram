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
$jsonStrArr = [];
while($thisRow = $allSensorInfo->fetch(PDO::FETCH_ASSOC)){
    $jsonStrRow = "{";
    $jsonStrRow .= "\"name\":\"" . $thisRow['name'] . "\"";
    $jsonStrRow .= ", \"message\":\"" . $thisRow['comment'] . "\"";
    $jsonStrRow .= ", \"timestamp\":\"" . $thisRow['post_time'] . "\"";
    $jsonStrRow .= "}";
    $jsonStrArr[] = $jsonStrRow;
}
$jsonStr = "[" . implode(", ", $jsonStrArr) . "]";

//$jsonStr = json_encode($allSensorInfo->fetchAll(PDO::FETCH_ASSOC));
echo($jsonStr);

?>