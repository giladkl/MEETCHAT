
<?php
session_start();
date_default_timezone_set('Asia/Jerusalem');

$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$t=time();
$now=date('Y-m-d h:i:s',$t);
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
$roomid=$_SESSION['dn'];
$user=$_SESSION['user'];
$t=time();
$now=date('Y-m-d h:i:s',$t);
$q=mysql_query("SELECT * FROM `online` WHERE `room`='$roomid'");
$f=false;
while ($qq=mysql_fetch_assoc($q)) {
if ($qq['username']==$user) {
$f=true;
}
}
if ($f==true) {
$uq=mysql_query("UPDATE `online` SET `date`='$now' WHERE `room`='$roomid' AND `username`='$user'");
}else {
$uq=mysql_query("INSERT INTO `online` (`date`,`room`,`username`) VALUES('$now','$roomid','$user')");
}
$q=mysql_query("SELECT * FROM `online` WHERE `room`='$roomid'");
while ($qq=mysql_fetch_assoc($q)) {
if(strtotime($now)-strtotime($qq['date'])<=5) {
echo $qq['username'];
echo " is online";
echo "<hr><br>";
} else {
//user is offline
}
}
?>