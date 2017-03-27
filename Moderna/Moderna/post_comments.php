<?php

$host="localhost";
$username="root";
$password="";
$databasename="test";

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

if(isset($_POST['comment']) && isset($_POST['username']))
{
  $comment=$_POST['comment'];
  $name=$_POST['username'];
  $insert=mysql_query("insert into comments values('','$name','$comment',CURRENT_TIMESTAMP)");
}

echo("Dude.");
?>