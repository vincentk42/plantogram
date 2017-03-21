<!doctype html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Plant Profile Entry Form</title>
    <style>
    </style>

</head>
<body>
   <form method="post" action="process.php">
Name : <input type="text" name="user_name" placeholder="Enter Your Name" /><br />
potId : <input type="text" name="potId" placeholder="Enter potId" /><br />
password : <input type="text" name="user_password" placeholder="Enter password" /><br />
owner : <input type="text" name="owner" placeholder="Enter the owner" /><br />
location : <input type="text" name="location" placeholder="Enter Your location" /><br />
plantType : <input type="text" name="plantType" placeholder="Enter Plant Type" /><br />
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

    //mysql credentials
    $mysql_host = "localhost";
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_database = "test";
    
    $u_name = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
    $u_potId = filter_var($_POST["user_potId"], FILTER_SANITIZE_EMAIL);
    $u_password = filter_var($_POST["user_password"], FILTER_SANITIZE_STRING);
    $u_owner = filter_var($_POST["user_owner"], FILTER_SANITIZE_STRING);
    $u_location = filter_var($_POST["user_location"], FILTER_SANITIZE_STRING);
    $u_plantType = filter_var($_POST["user_plantType"], FILTER_SANITIZE_STRING);

    if (empty($u_name)){
        die("Please enter your name");
    if (empty($u_potId)){
        die("Please enter your potId");
    if (empty($u_password)){
        die("Please enter your password");
    if (empty($u_owner)){
        die("Please enter your owner");
    if (empty($u_location)){
        die("Please enter your location");
    if (empty($u_plantType)){
        die("Please enter your plant Type");



    //Open a new connection to the MySQL server
    //see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }   
    
    $statement = $mysqli->prepare("INSERT INTO planttest (name, potId, password, owner, location, plantType) VALUES(?, ?, ?, ?, ?, ?)"); //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('ssssss', $u_name, $u_potId, $u_password, $u_owner, $u_location, $u_plantType); //bind values and execute insert query
    
    if($statement->execute()){
        print "Hello " . $u_name . "!, your message has been saved!";
    }else{
        print $mysqli->error; //show mysql error if any
    }
}
?>
