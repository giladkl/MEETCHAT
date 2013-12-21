<?php
session_start();
if(isset($_SESSION['user'])){
header('Location: textt.php');
}
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<title>
Register
</title>
</head><body align="center" bgcolor="#F8F8F8" style="text-align:center;">
<div class="log">
<form action="register2.php" method="post">
Username: <input type="text" name="username" placeholder="enter a cool user name!"><br>
Password: <input type="password" name="password" placeholder="enter a safe password!"><br>
Email: <input type="email" name="Email" placeholder="enter a valid e-mail!"><br>
<br>
<input type="submit" value="Register">
</form>
<a href="default.php">
<button value="cancel">cancel</button></a>
</div>
<div class="cred">
made by: Gilad Kleinman and Bahjat Kawar
</div>
</body>
</html>