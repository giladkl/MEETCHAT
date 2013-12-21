<?php
session_start();
if(!isset($_SESSION['user'])){
header('Location: mainpage.php');
}
$_SESSION['chatn']=$_GET['chatname'];
?>
<form action="addask.php" method="GET">
Chat question: <input type="text" name="chatquestion"><br>
Chat answer: <input type="text" name="chatanswer"><br>
<input type="submit" value="submit">
</form>