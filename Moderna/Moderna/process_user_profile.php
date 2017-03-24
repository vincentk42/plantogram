<?php
$userName = false;
$userpotId = false;
$userPassword = false;
$userOwner = false;
$userLocation = false;
$userplantType = false;
$userplantPic = false;

if(isset($_REQUEST['userName'])){
	$userName = $_REQUEST['userName'];
//	echo("hey dudddde". $userName);
}
if(isset($_REQUEST['userpotId'])){
	$userpotId = $_REQUEST['userpotId'];
}
if(isset($_REQUEST['userPassword'])){
	$userPassword = $_REQUEST['userPassword'];
}
if(isset($_REQUEST['userOwner'])){
	$userOwner = $_REQUEST['userOwner'];
}
if(isset($_REQUEST['userLocation'])){
	$userLocation = $_REQUEST['userLocation'];
}
if(isset($_REQUEST['userPlantType'])){
	$userplantType = $_REQUEST['userPlantType'];
}
if(isset($_REQUEST['userplantPic'])){
	$userplantPic = $_REQUEST['userplantPic'];
}



// $name = $_REQUEST["user_name"];
// //echo($name);
// $potId = $_REQUEST["user_potId"];
// $password = $_REQUEST["user_password"];
// $owner = $_REQUEST["user_owner"];
// $location = $_REQUEST["user_location"];
// $plantType = $_REQUEST["user_plantType"];
// $plantPic = $_REQUEST["user_plantPic"];

$dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");
$prepStmt = $dbConn->prepare("INSERT INTO `planttest` (`name`, `potId`, `password`, `owner`, `location`, `plantType`, `planturl`) values ( :name, :potId, :password, :owner, :location, :plantType, :plantPic)");
$paramsForDatabase = [":name" => $userName
                    ,":potId" => $userpotId
                    ,":password" => $userPassword
                    ,":owner" => $userOwner
                    ,":location" => $userLocation
                    ,":plantType" => $userplantType
					,":plantPic" => $userplantPic
];
echo("information has been succesfully uploaded into a database");
 
$results = $prepStmt->execute($paramsForDatabase);
if(! $results)
        {
            $errorMsg[] = "Database probs, yo.";
            $errorMsg = $errorMsg + $dbConn->errorInfo();
            
        }



?>
