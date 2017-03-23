<!doctype html>
<html>
<head>

<?php

if (isset($_REQUEST['token'])) {

    $IDtoken = $_REQUEST['token'];

    $dbConn = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8mb4", "root", "");

    $inputStr = "SELECT `googleIDtoken` from plantogramlogin WHERE `googleIDtoken` = {$IDtoken}";

    $results = $dbConn->query($inputStr);

      while ($thisRow = $results->fetch(PDO::FETCH_ASSOC)) {
        if ($thisRow['googleIDtoken'] === $IDtoken){
            // $tokenFromDatabase = $thisRow['googleIDtoken'];
            break;
        } else {
          echo ("<script>window.location.href = 'chain4.php';</script>");
        }
      }
} else {
    echo ("<script>window.location.href = 'chain5.php';</script>");
}

?>
</head>

<body>
    <p>Success!</p>    
</body>
</html>