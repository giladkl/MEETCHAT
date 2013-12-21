<?php
session_start();
if(!isset($_SESSION['user'])){
header('Location: default.php');
}
$_SESSION['refresh']='yes';
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
$con=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$v=$_SESSION['dn'];
mysqli_query($con,"DELETE FROM chats WHERE chatname='$v'");
$con=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
mysqli_query($con,"DELETE FROM `all` WHERE chatname='$v'");
$con=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
mysqli_query($con,"DELETE FROM `online` WHERE room='$v'");
mysqli_close($con);
header('Location: mainpage.php');
?>