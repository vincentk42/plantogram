<?php
$plantOwner = false;
$plantName = false;
$plantType = false;
$plantLocation = false;

if(isset($_REQUEST['plantOwner'])){
    $plantOwner = $_REQUEST['plantOwner'];
	 //echo("this is a check". $plantOwner);
}
if(isset($_REQUEST['plantName'])){
	$plantName = $_REQUEST['plantName'];
}
if(isset($_REQUEST['plantType'])){
	$plantType = $_REQUEST['plantType'];
}
if(isset($_REQUEST['plantLocation'])){
	$plantLocation = $_REQUEST['plantLocation'];
}




// $plantOwner = $_REQUEST["plant_Owner"];
// $plantName = $_REQUEST["plant_Name"];
// $plantType = $_REQUEST["plant_Type"];
// $plantLocation = $_REQUEST["plant_Location"];
//echo("hello". $plantLocation);

$dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");
$prepStmt = $dbConn->prepare("INSERT INTO `plantprofile` (`plantOwner`, `plantName`, `plantType`, `plantLocation`) values ( :owner, :name, :type, :location)");


$paramsForDatabase = [":owner" => $plantOwner
                    ,":name" => $plantName
                    ,":type" => $plantType
                    ,":location" => $plantLocation
  
]; 
$results = $prepStmt->execute($paramsForDatabase);
if(! $results)
        {
            $errorMsg[] = "Database probs, yo.";
            $errorMsg = $errorMsg + $dbConn->errorInfo();
            //$prepStmt->debugDumpParams();
        }

echo("Your information has been received");

?>