<?php
# ---- Page Checks if username and password has a mach in mysql database-----
session_start();
$is_login_valid=false;
$username=$_POST['username'];
$password=md5($_POST['password']);
# --- mysql login ----
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `reg`";
$result = mysql_query($query) or die(mysql_error());
# --- user-name and password validation ----
while($row=mysql_fetch_array($result)) {
if ($row['user']==$username && $row['pass']==$password){
$_SESSION['username']=$username;// start Session with user-name
$_SESSION['password']=$password;// start Session with password
header('Location: mainpage.php');// If login is valid - go to homepage
$is_login_valid=true;
}
}
if (!$is_login_valid){
$_SESSION['enters']=1;
header('Location: default.php');
}
?>