<html><body>
<form action="donoteverenter.php" method="post">
from: <br><input type="from" name="fro" class="input"><br>
to: <br><input type="to" name="to" class="input"><br>
Reply-to: <br><input type="replyto" name="replyto" class="input"><br>
subject: <br><input type="subject" name="subject" class="input"><br>
message: <br><textarea name="message" rows="10" cols="50"></textarea><br>
<input type="submit" value="Submit" id="submit">
</body>
</html>
<?php
if(isset($_POST["to"]) && isset($_POST["fro"]) & isset($_POST["replyto"]) & isset($_POST["message"]) & isset($_POST["subject"])){
$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = 'From: ' . $_POST['fro'] . "\r\n" .
    'Reply-To: ' . $_POST['replyto'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
echo '<script type="text/javascript">
alert("Mail sent!");
</script>';
}
?>