<html>
<body bgcolor="white"><head>
</head>
<?php
session_start();
if(!isset($_SESSION['user'])){
header('Location: default.php');
}
session_start();
$real=0;
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `all` SORT BY `time` ASC";
$result = mysql_query($query) or die(mysql_error());
while($w=mysql_fetch_array($result)) {
if ($_SESSION["dn"]==$w['chatname']){
$real=$real+1;
}
}
if(!isset($_SESSION['views'])){
$_SESSION['views']=-1;
}
if ($_SESSION['refresh']=='yes'){
$_SESSION['refresh']='no';
$_SESSION['views']=$real;
}
elseif ($_SESSION['views']!=$real){
$_SESSION['views']=$real;
/*
echo "<script>
   parent.changeURL('messagebox.php');
</script>";
}
*/
?>
</body>
</html>
