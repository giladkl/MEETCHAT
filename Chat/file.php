<?php 
$country = file_get_contents('http://api.hostip.info/get_json.php?ip='.$_SERVER['REMOTE_ADDR']); 
// Below is the example IP from canada. 
//$country = file_get_contents('http://api.hostip.info/get_html.php?ip=12.215.42.19&position=true'); 

//This should output CA abbr for CANADA. 
echo $country; 

?>