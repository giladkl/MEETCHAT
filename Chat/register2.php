<html>
<head>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<title>
Register
</title>
</head><body align="center" bgcolor="#F8F8F8" style="text-align:center;">
<div class="log">
<?php
// ------- Page inserts restoration into mysql --------
//  --- receives restoration data from register.php ---
$email=$_POST['Email'];
$username=$_POST['username'];
$password=md5($_POST['password']);

$validregister=true;
// --- mysql login ---
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `reg`";
$result = mysql_query($query) or die(mysql_error());
// --- check if the registration is valid... ---
while($row=mysql_fetch_array($result)) {
if ($row['user']==$username){
$validregister=false;
echo 'username already exists!<br>';
}
if ($row['pre']==$email){
$validregister=false;
echo 'Email already exists!<br>';
}
if(substr($username, 0, 1)==''){
$validregister=false;
echo 'bad username!<br>';}
$str = $username;
$strlen = strlen( $str );
for( $i = 0; $i <= $strlen; $i++ ) {
    $char = substr( $str, $i, 1 );
    if (($char==">" || $char=="<") && $validregister==true){
	$validregister=false;
	echo 'bad username!';
}
}
$str = $email;
$strlen = strlen( $str );
for( $i = 0; $i <= $strlen; $i++ ) {
    $char = substr( $str, $i, 1 );
    if (($char==">" || $char=="<") && $validregister==true){
	$validregister=false;
	echo 'bad email!';
}
}
}

// --- inserts into mysql ---
if ($validregister){
if (mysql_query ("INSERT INTO `reg` (`user`, `pass`, `pre`) VALUES('$username', '$password', '$email')") or die(mysql_error())){
echo 'done!';
// --- send's email to user ---
$to = $email;
$subject = 'Welcomet to Meet-chat!';
$message = 'Hello, ' . $username . '
congratulation for joining MEET-chat, We hope you enjoy it!
MEET-chat creators - Bahjat Kawar and Gilad Kleinman';
$headers = 'From: noreplyrmail@Meetchat.com' . "\r\n" .
    'Reply-To: dkgs1998@yahoo.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);

session_start();
$_SESSION['username']=$_POST['username'];
header('Location: default.php');
}
}
else{
echo '<br><a href="register.php">back to register page</a>';}
?>
</div>
<div class="cred">
made by: Gilad Kleinman and Bahjat Kawar
</div>
</body>
</html>