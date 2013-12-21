<html>
<head>
<script src="jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
function load(){     
    $.ajax({
            url: "online.php",
            success: function(data){
                if (document.getElementById("list").innerHTML!=data) { document.getElementById("list").innerHTML=data; }
             }
          });
t=setTimeout(function(){load()},1000);
  }
</script>
</head>
<body onload="load()">
<div id="list"></div>
</body>
</html>