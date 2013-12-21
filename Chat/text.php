<?php
session_start();
if(!isset($_SESSION['user'])){
header('Location: default.php');
}
$v=0;
$x=0;
if ($_GET['chatname']!=''){
$_SESSION['dn']=$_GET['chatname'];
}
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$result = mysql_query("SELECT * FROM `chats` WHERE `chatname`='".$_SESSION['dn']."'") or die(mysql_error());
while($w=mysql_fetch_array($result)) {
if ($_POST['answer']!=$w['answer'] && $w['rate']==0){
$_SESSION['j']=1;
header('Location: q.php?chatname=' . $_GET['chatname']);
}
}

?>
<html>
<head>
<title>
<?php  echo $_SESSION["dn"]; ?>
</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<script src="jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
 $("#snd").click(function(){     
    $.ajax({
            url: "m.php?msg="+document.getElementById("msg").value,
            success: function(data){
                document.getElementById("msg").value="";
             }
          });

  });
$("#snd").keyup(function(e){     
    if (e.keyCode == 13) {
        $.ajax({
            url: "m.php?msg="+document.getElementById("msg").value,
            success: function(data){
                document.getElementById("msg").value="";
             }
          });
    }

  });
</script>
</head>
<body align="center" bgcolor="#F8F8F8" style="text-align:center;">
<div class="header">
<a class="a"><font color="#C8C8C8" style="font-family:La Bamba LET;"> <?php  echo $_SESSION["dn"]; ?></font></a>
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

<?php

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
if ($w['rate']!=0 && $w['chatname']==$_SESSION["dn"] && $w['username']==$_SESSION['user']){
$z=$z+1;
}
}
if ($z==0){
echo '
Rate chat: <style>
.font:hover{color:red;}
a{color: inherit;text-decoration:none;}
</style>
<font class="font" color="blue"><a href="1.php">
&#9733;</a>
<font class="font" color="blue"><a href="2.php">
&#9733;</a>
<font class="font" color="blue"><a href="3.php">
&#9733;</a>
<font class="font" color="blue"><a href="4.php">
&#9733;</a>
<font class="font" color="blue"><a href="5.php">
&#9733;</a>
</font></font></font></font></font>';}
else{ 
echo 'Welcome to the chat room! &#12483;';
}
?>
<iframe src="messagebox.php" scrolling="no" class="frame" width="500px" frameborder="0" id="i"></iframe>
<iframe src="send.php" scrolling="no" style="width:500px;height:60px;border:none;soverflow:hidden;"></iframe>
</div></div>
<div class="cred">
made by: Gilad Kleinman and Bahjat Kawar
</div>
<iframe id="online" src="online2.php" frameborder="0" width="200px" height="auto" ></iframe></body>
</html>