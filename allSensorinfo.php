<?php
$timestamp = false;
$temperature = false;
$humidity = false;

if(isset($_REQUEST['timestamp'])){
    $timestamp = $_REQUEST['timestamp'];
}
if(isset($_REQUEST['temperature'])){
    $temperature = $_REQUEST['temperature'];
}
if(isset($_REQUEST['humidity'])){
    $humidity = $_REQUEST['humidity'];
}

$dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");

$allSensorInfo = $dbConn->prepare("SELECT `timestamp`, `temperature`, `humidity` from `plant_table");
$allSensorInfo->execute(array());

while($thisrow = $allSensorInfo->fetch(PDO::FETCH_ASSOC)){
    echo("<div>
                <p>timestamp: {$thisrow['timestamp']}</p>
                <p>temperature: {$thisrow['temperature']}</p>
				<p>humidity: {$thisrow['humidity']}</p>
                
        </div>");
}
echo("<input type='button' id='deletethis' value='Click here to delete this'>");
?>
