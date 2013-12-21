<?php
session_start();
$z=0;
if(!isset($_SESSION['user'])){
header('Location: mainpage.php');
}
if ($_POST['chatt']=='answer'){
header('Location: ask.php?chatname=' . $_POST['chatname']);
echo 'hi!';
$z=102139;
}
session_start();
$a = $_SESSION['user'];
$b = $_POST['chatname'];
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";

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
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
if (mysql_query ("INSERT INTO `chats` (`username`, `chatname`) VALUES('$a', '$b')") or die(mysql_error())){
header('Location: mainpage.php');
}}
elseif($z!=0 && $b==''){
$_SESSION['a']=1;
header('Location: addc.php');
}
?>