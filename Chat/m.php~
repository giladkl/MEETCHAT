<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: mainpage.php');
}
//$_SESSION['refresh']='yes';
session_start();
$a = $_SESSION['username'];
$c = $_SESSION['dn'];
$b = $_GET['msg'];
date_default_timezone_set('Asia/Jerusalem');
$b=str_replace("'","~~~```",$b);
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
if ($b!=''){
$now=time();
if (mysql_query ("INSERT INTO `all` (`username`, `message`, `chatname`, `time`) VALUES('$a', '$b', '$c','$now')") or die(mysql_error())){
header('Location: send.php');
}}
else{
header('Location: send.php');}
 ?>					