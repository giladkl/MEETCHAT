<?php
session_start();
if(!isset($_SESSION['user'])){
header('Location: default.php');
}
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<title>
Website
</title>
</head><body align="center" bgcolor="#F8F8F8" style="text-align:center;">

<div class="header">
<a class="a"><font color="#C8C8C8" style="font-family:La Bamba LET;"> New chat</font></a>
</div>
<div align="left" style="text-align:left;width:100%;"><a href="mainpage.php">
<div class="logout2">
<font id="font" color="#C8C8C8" style="La Bamba LET;">Back to chat list</font>
</div></a>
<a href="logout.php">
<div class="logout">
<font id="font" color="#C8C8C8" style="La Bamba LET;">Log out</font>
</div>
</a>
</div>

<div class="log">
<form action="chatr.php" method="post">
ChatName: <input type="text" name="chatname"><br>
<br>
<input type="radio" name="chatt" value="normal"> Normal chat<br>
<input type="radio" name="chatt" value="answer"> Answer a question to get in chat<br>
<input type="submit" value="Create">
</form>
<a href="mainpage.php">
<button value="cancel">cancel</button></a>
</div>
<div class="cred">
Made by: Gilad Kleinman and Bahjat Kawar
</div>
</body>
</html>
<?php
session_start();
if ($_SESSION['a']==1){
print '<script>';
print 'alert("Chat name already exists!")'; 
print '</script>';
$_SESSION['a']=0;}
?>