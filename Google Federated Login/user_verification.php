<?php

require_once 'vendor/autoload.php';

$CLIENT_ID = "769192399218-r4a3o154mnvq42m7i0dp1vbd69lk2l4e.apps.googleusercontent.com";

$id_token = "";
if (isset($_REQUEST['idtoken'])) $id_token = $_REQUEST['idtoken'];

// Get $id_token via HTTPS POST.

$client = new Google_Client(['client_id' => $CLIENT_ID]);
$payload = $client->verifyIdToken($id_token);
if (!$payload) {  
  // Invalid ID token
  echo ("Invalid ID token");

} else {

  $userid = $payload['sub'];

  $dbConn = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8mb4", "root", "");
  
  $inputStr = "INSERT INTO plantogramlogin (`googleIDtoken`, `timestamp`) VALUES ({$userid}, NOW())";

  $dbConn->query($inputStr);

  echo ($userid);
  
  }


?>