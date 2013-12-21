<?php
session_start();
if(!isset($_SESSION['user'])){
header('Location: mainpage.php');
}
$_SESSION['refresh']='yes';

session_start();
$a = $_SESSION['user'];
$b = $_SESSION["dn"];
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
if (mysql_query ("INSERT INTO `chats` (`username`, `chatname`, `rate`) VALUES('$a', '$b', 5)") or die(mysql_error())){
header('Location: textt.php?' . 'chatname=' . $_SESSION["dn"]);
}
?>