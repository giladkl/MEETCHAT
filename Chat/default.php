<?php
session_start();
if(isset($_SESSION['user'])){
header('Location: mainpage.php');
}
?>
<html>
<head>
<title>
Login
</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body bgcolor="#F8F8F8" style="text-align:center;">
<div class="log">
<form action="checklogin.php" method="post">
Username: <br><input type="text" name="username" class="input"><br>
Password: <br><input type="password" name="password" class="input"><br><br>
<input type="submit" value="Submit" id="submit">
<a href="register.php">
<button type="button"  id="submit">I don't have an account</button>
</a>
</form>
</div>
<?php
session_start();
if ($_SESSION['enters']>0){
print '<script type="text/javascript">'; 
print 'alert("Wrong username or password!")'; 
print '</script>';
$_SESSION['enters']=0;
}
?><div class="cred">
made by: Gilad Kleinman and Bahjat Kawar
</div>
</body>
</html>
