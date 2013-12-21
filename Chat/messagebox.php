<html>
<body bgcolor="#F8F8F8">
<script>
function changeURL( url ) {
    document.location = url;
}
</script>
<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: default.php');
}
?>
<iframe src="messagesframe.php#bottom" style="overflow-x:hidden; overflow-y:auto;" class="frame" width="100%" frameborder="0" height="95%" id="fa"></iframe>
<iframe src="frame2.php" name="f" scrolling="no" class="frame" width="0" frameborder="0" height="0"></iframe>
</body>
</html>