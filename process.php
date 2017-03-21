<?php
$name = $_REQUEST["user_name"];
//echo($name);
$potId = $_REQUEST["user_potId"];
$password = $_REQUEST["user_password"];
$owner = $_REQUEST["user_owner"];
$location = $_REQUEST["user_location"];
$plantType = $_REQUEST["user_plantType"];

$dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");
$prepStmt = $dbConn->prepare("INSERT INTO `planttest` (`name`, `potId`, `password`, `owner`, `location`, `plantType`) values ( :name, :potId, :password, :owner, :location, :plantType)");

$paramsForDatabase = [":name" => $name
                    ,":potId" => $potId
                    ,":password" => $password
                    ,":owner" => $owner
                    ,":location" => $location
                    ,":plantType" => $plantType
]; 
$results = $prepStmt->execute($paramsForDatabase);
if(! $results)
        {
            $errorMsg[] = "Database probs, yo.";
            $errorMsg = $errorMsg + $dbConn->errorInfo();
            
        }
echo("finished entering info in db");
?>