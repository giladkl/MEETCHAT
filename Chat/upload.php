<?php
//LOGIN CHECK
session_start();
if(!isset($_SESSION['user'])){
header('Location: default.php');
}
?>
<html>
<head>
<title>
Upload a picture
</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body align="center" bgcolor="#F8F8F8" style="text-align:center;">
<div class="header">
<a class="a"><font color="#C8C8C8" style="font-family:La Bamba LET;"> <?php  echo $_GET["chatname"]; ?></font></a>
</div>
<div align="left" style="text-align:left;width:100%;"><a href="mainpage.php">
<div class="logout2">
<font id="font" color="#C8C8C8" style="La Bamba LET;">back to chat list</font>
</div></a>
<a href="logout.php">
<div class="logout">
<font id="font" color="#C8C8C8" style="La Bamba LET;">log out</font>
</div>
</a>
</div><div class="lg">

<div align="center" width="500px" class="y">
<b>Upload A picture of you!</b><br>
<form action="http://meety1.comuv.com/upload_.php" method="post"
enctype="multipart/form-data" onsubmit="document.GetElementById('user').value=<? echo $_SESSION['user']; ?>;">
<label for="file">Choose :</label>
<input type="file" name="file" id="file" />
<input type="hidden" name="user" id="user" value="<? echo $_SESSION['user']; ?>">
<input type="hidden" name="paz" id="paz" value="<? echo $_SESSION['pass']; ?>">
<br />
<input type="submit" name="submit" value="Submit" onclick="document.GetElementById('user').value=<? echo $_SESSION['user']; ?>;"/>
</form>
</div></div>
<div class="cred">
made by: Gilad Kleinman and Bahjat Kawar
</div>
</body>
</html>