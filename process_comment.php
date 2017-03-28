<?php
$name = false;
$comment = false;

if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
}
if(isset($_REQUEST['comment'])){
    $comment = $_REQUEST['comment'];
}

$dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");
$prepStmt = $dbConn->prepare("INSERT INTO `comments` (`name`, `comment`) values ( :name, :comment)");

$paramsForDataBase = [":name" => $name
    ,":comment" => $comment
];

$results = $prepStmt->execute($paramsForDataBase);

if(! $results)
{
    $errorMsg[] = "Database probs, yo.";
    $errorMsg = $errorMsg + $dbConn->errorInfo();
    //$prepStmt->debugDumpParams();
}

//echo('{"dude": "Your information has been received."}');


?>