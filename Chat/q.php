<html>
<head>
<title>
Login
</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body bgcolor="#F8F8F8" style="text-align:center;">

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
</div>
<div class="log">
<?php 
$v=$_GET['chatname'];
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `chats`";
$result = mysql_query($query) or die(mysql_error());
while($w=mysql_fetch_array($result)) {
if ($v==$w['chatname'] && $w['rate']==0){
echo $w['ask'] . '?';
}
}
if($_SESSION['j']==1){
$_SESSION['j']=0;
print '<script type="text/javascript">'; 
print 'alert("Wrong answer!")'; 
print '</script>';
}
echo '<form method="post" action="text.php?chatname=' . $_GET['chatname'] . '">';
?>
<BR><BR>
answer:<input name="answer" type="text">
<br>
<input type="submit">
</div>
</form>

</body>
</html>