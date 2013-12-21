<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: default.php');
}
?>
<html>
<head>
<title>
MEETchat
</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body align="center" bgcolor="#F8F8F8" style="text-align:center;">
<div class="header">
<a class="a"><font color="#C8C8C8" style="font-family:La Bamba LET;"> Welcome, <?php session_start(); echo $_SESSION['username']; ?>!</font></a>
</div>
<div align="left" style="text-align:left;width:100%;">
<a href="addc.php">
<div class="logout2">
<font id="font" color="#C8C8C8" style="La Bamba LET;">Create a chat</font>
</div>
</a>
<a href="logout.php">
<div class="logout">
<font id="font" color="#C8C8C8" style="La Bamba LET;">log out</font>
</div>
</a>
</div>
<br><br><div class="log">
Choose your Chat<br><br>
<style>
.du{position:absolute;display:inline-block;margin-top:10px;}
.left{text-align:left; margin-left:20px;}
</style>
<div class="left">
<?php
session_start();
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `chats`";
$_SESSION['fgfg']='';
$result = mysql_query($query) or die(mysql_error());
while($w=mysql_fetch_array($result)) {
if ($w['rate']==0){
if ($w['ask']!=''){
echo '<a href="q.php?chatname='. $w['chatname'] . '"><button class="button" name="chatname" style="margin-top:10px;" type="button">' . $w['chatname'] . '</button></a>';
}
else{
echo '<a href="textt.php?chatname='. $w['chatname'] . '"><button class="button" name="chatname" style="margin-top:10px;" type="button">' . $w['chatname'] . '</button></a>';
}

$g=0;
$l=0;
$r = mysql_query($query) or die(mysql_error());
while($v=mysql_fetch_array($r)) {
if ($v['rate']!=0 && $v['chatname']==$w['chatname']){
$l=$l+$v['rate'];
$g=$g+1;
}
}
if($w['username']==$_SESSION['username']){
echo '<a href="delete.php?chatname=' . $w['chatname'] . '"><button class="button" style="background-color:white;border-radius:15px;margin-top:10px;" name="chatnameno" type="submit" value="' . $w['chatname'] . '">' . 'delete chat' . '</button></a>';}
if ($g!=0){
$l=$l/$g;
$l=round($l);
echo '<div class="du">';
foreach (range(0, $l-1) as $number) {
    echo "&#9733";
}
}
if ($g!=0){
echo '</div>';}
echo '<br>';

}
}
?>
</div>
</div>
<div class="cred">
made by: Gilad Kleinman and Bahjat Kawar
</div>

</html>
</body>