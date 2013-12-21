<?php
session_start();
if(!isset($_SESSION['user'])){
header('Location: textt.php');
}
session_start();
date_default_timezone_set('Asia/Jerusalem');
$x=0;
$v=$_SESSION['dn'];
if (isset($_GET['name'])) {$v=$_GET['name']; }
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `all` ORDER BY `time` ASC";
$result = mysql_query($query) or die(mysql_error());
while($w=mysql_fetch_array($result)) {
$x=$x+1;
}
echo $x;
$y=0;
$jq=$_GET['start'];
$result = mysql_query($query) or die(mysql_error());
while($w=mysql_fetch_array($result)) {
if ($v == $w['chatname'] && $y>$x-100 && $y>=$jq){
$c=str_replace("<","&lt;",$w['message']);
$c=str_replace(">","&gt;",$c);
$c=str_replace("~~~```","&#39;",$c);
$c=str_replace('"',"&quot;",$c);
$c=mysql_real_escape_string($c);
$c=str_replace(":)","<img src='happy.jpg' width='15' height='15'>",$c);
$c=str_replace(":(","<img src='sad.jpg' width='15' height='15'>",$c);
$c=str_replace(";)","<img src='wink.jpg' width='15' height='15'>",$c);
$c=str_replace(":D","<img src='grin.jpg' width='15' height='15'>",$c);
$c=str_replace(":@","<img src='angry.jpg' width='15' height='15'>",$c);
$c=str_replace("^_^","<img src='shift6.jpg' width='15' height='15'>",$c);
$img="";
$dim=mysql_query("SELECT * FROM `reg` WHERE `user`='".$w['username']."'");
$pic=false;
while($dim2=mysql_fetch_assoc($dim)) {
if ($dim2['pic']=='yes') {
$pic=true;
}
}
if ($pic) {
$img="<img src='http://meety1.comuv.com/upload/".$w['username'] . ".pic' width='32' height='25' style='width:auto;'>";
} else {
$img="<img src='nopic.png' width='32' height='32'>";
}
echo '<div class="text"><b>[' . date('H:i:s',$w['time']) . '] ' . $img . ' '. $w['username'] . '</b>: ' . $c . '</div>';
if ($_SESSION['count']!=$y && $_SESSION['bg']==0){
$_SESSION['count']=$y;
}
else{
$_SESSION['count']=$y;
$_SESSION['bg']=0;
}
}
$y=$y+1;
}
?>