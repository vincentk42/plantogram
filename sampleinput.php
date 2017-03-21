<!DOCTYPE html>
<html>
<head>
<title> Simple PHP contact form with MySQL and Form Validation </title>
</head>
<body>
<h3> Contact US</h3>
   <form method="post" action="process.php">
Name : <input type="text" name="user_name" placeholder="Enter Your Name" /><br />
potId : <input type="text" name="user_potId" placeholder="Enter potId" /><br />
password : <input type="text" name="user_password" placeholder="Enter password" /><br />
owner : <input type="text" name="user_owner" placeholder="Enter the owner" /><br />
location : <input type="text" name="user_location" placeholder="Enter Your location" /><br />
plantType : <input type="text" name="user_plantType" placeholder="Enter Plant Type" /><br />
<input type="submit" value="Submit">
</form>

</body>
</html>
