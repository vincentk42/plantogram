<?php

    //connects to the database outside of the if statement so the output is performed. Otherwise, error
    $dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");
//    $temp = $_POST["temp"];
//    $hum = $_POST["hum"];
//    $prepStmt = $dbConn->prepare("INSERT INTO `plant_table` (`timestamp`, `temperature`, `humidity`) VALUES (:tstamp, :temp, :hum)");
//    $paramsForDatabase = [":tstamp" => date("Y-m-d H:i:s", time())
//                     ,"temp" => $temp
//                     ,"hum" => $hum 
//                     ];
//            $prepStmt->execute($paramsForDatabase);
    echo("Done");
//    echo("this is the shittt " .  $temp);
    $i=0;
    foreach($_REQUEST as $key => $val){
        $i++;
        if($i===1){
           $temp = $val;
        }
        if($i===2){
            $hum = $val;
            $prepStmt = $dbConn->prepare("INSERT INTO `plant_table` (`timestamp`, `temperature`, `humidity`) VALUES (:tstamp, :temp, :hum)");
            $paramsForDatabase = [":tstamp" => date("Y-m-d H:i:s", time())
                                  ,"temp" => $temp
                                  ,"hum" => $hum 
                                 ];
            $prepStmt->execute($paramsForDatabase);
            $i=0;
            echo("   Inserted into Tablet DB");
        }
    };
   // echo($_POST[])

?>

