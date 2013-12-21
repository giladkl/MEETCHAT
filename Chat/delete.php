<?php
session_start();
$_SESSION['dn']=$_GET['chatname'];
?>
<script type="text/javascript">
var x=window.confirm("Are you sure you want to delete?")
if (x)
window.location = "delete1.php"
else
window.location = "mainpage.php"
</script>