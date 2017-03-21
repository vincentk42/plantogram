<?php

require_once 'vendor/autoload.php';

$CLIENT_ID = "769192399218-r4a3o154mnvq42m7i0dp1vbd69lk2l4e.apps.googleusercontent.com";

$id_token = "";
if (isset($_REQUEST['idtoken'])) $id_token = $_REQUEST['idtoken'];

// Get $id_token via HTTPS POST.

$client = new Google_Client(['client_id' => $CLIENT_ID]);
$payload = $client->verifyIdToken($id_token);
if ($payload) {
  $userid = $payload['sub'];
  echo $userid;
  echo ("<br>NAME: " . $payload['name']);



} else {
  // Invalid ID token
  echo ("Invalid ID token");
}


?>