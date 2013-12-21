<html>

<head>
<script src="jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
var hid=0;
function load(){     
    $.ajax({
            url: "pull.php?start="+hid,
            success: function(data){
	 if (data.indexOf("<")>0) {
                document.getElementById("great").innerHTML+=data.substring(data.indexOf("<"));
	 hid=data.substring(0,data.indexOf("<"));
	 var x = 0;
	 var y = document.height;
	 window.scroll(x,y);
	 }
             }
          });
t=setTimeout(function(){load()},1000);
  }
</script>
<style>
.great{width:100%;background-color:#F8F8F8;margin:auto;height:100%;}
.text{width:90%; margin-left:0px; background-color:#C8C8C8; height:auto;padding-left:15px;border:1px solid #F8F8F8;word-wrap:break-word;}
</style>
</head>
<body bgcolor="#F8F8F8" onload="load()">
<input type="hidden" id="hide" value="0">
<div class="great" id="great">
<?php
session_start();

session_start();
?>
<a id="bottom"></a>
</div>
</body>
</html>