<?php
// --- check if user is logged in ---
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
// --- mysql login ---

$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `chats`";
$result = mysql_query($query) or die(mysql_error());

// --- write all chat name and star average ---

while($row=mysql_fetch_array($result)) {
if ($row['rate']==0) // if rate==0 it mean's this is a chat that was created by $row['username']. if rate!=0, it's howmuch $row['username'] ratted the chat.
{
if ($row['ask']!='')// if you do need to answer a question to enter chat
{
echo '<a href="q.php?chatname='. $row['chatname'] . 
'"><button class="button" name="chatname" style="margin-top:10px;" type="button">' . $row['chatname'] . '</button></a>';
}
else// if you don't need to answer a question to enter chat
{
echo '<a href="noquestionChat.php?chatname='. $row['chatname'] . 
'"><button class="button" name="chatname" style="margin-top:10px;" type="button">' . $row['chatname'] . '</button></a>';
}

// ---------------- check star average rating... -------------

$row_count=0;
$row_sum=0;
$r = mysql_query($query) or die(mysql_error());

// --- enter another loop to find all ratings ---

while($row2=mysql_fetch_array($r)) 
{
if ($row2['rate']!=0 && $row2['chatname']==$row['chatname']){
$row_sum=$row_sum+$row2['rate'];
$row_count=$row_count+1;
}
}

// ------ in case that $row['username'] (chat creator) is the guy who logged in, give him the option to delete chat. -----

if($row['username']==$_SESSION['username'])
{
echo '<a href="delete.php?chatname=' . $row['chatname'] . 
'"><button class="button" style="background-color:white;border-radius:15px;margin-top:10px;" name="chatnameno" type="submit" value="'
 . $row['chatname'] . '">' . 'delete chat' . '</button></a>';
 }
 
// -------- print star average -------

if ($row_count!=0){
$row_sum=$row_sum/$row_count;
$row_sum=round($row_sum);
echo '<div class="du">';
foreach (range(0, $row_sum-1) as $number) {
    echo "&#9733";
}
echo '</div>';
}
echo '<br>';// for the next chatname...
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