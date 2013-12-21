<?php
session_start();
if(!isset($_SESSION['user'])){
header('Location: mainpage.php');
}
session_start();
$a = $_SESSION['user'];
$b = $_SESSION['chatn'];
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$z=0;
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `chats`";
$result = mysql_query($query) or die(mysql_error());
while($w=mysql_fetch_array($result)) {
if ($w['chatname']==$b){
$z=$z+1;
}}
if ($z==0 && $b!=''){
$v=$_GET['chatquestion'];
$n=$_GET['chatanswer'];
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
if (mysql_query ("INSERT INTO `chats` (`username`, `chatname`, `ask`, `answer`) VALUES('$a', '$b', '$v', '$n')") or die(mysql_error())){
header('Location: mainpage.php');
}}
else{
$_SESSION['a']=1;
header('Location: addc.php');
}
?>