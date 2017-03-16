<?php
include("header1.php");
if(isset($_SESSION['user']))
{ 
if($_SESSION['utype']=="courier")
{ if($_SESSION['user']=="courier_babu")
{ 
?>
<html>
<head><title>courier babu</title></head>
<link rel="stylesheet" href="style.css" type="text/css"/>
<script>
function order()
{
	var o=document.getElementById("od").value;
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{
		if(x.readyState==4 && x.status==200)
		{
			document.getElementById("cod").innerHTML=x.responseText;
		}
	};
	x.open("GET","cod_details.php?t="+o,true);
	x.send();
}
function s()
{
	var st=document.getElementById("st").value;
	var h=document.getElementById("h").value;
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{
		if(x.readyState==4 && x.status==200)
		{
			document.getElementById("cod").innerHTML=x.responseText;
		}
	};
	x.open("GET","courier_update.php?status="+st+"&a="+h,true);
	x.send();

}
</script>
<body>

<div class="guli" align="center">
<ul>
<li><a href="courier.php"><h1>HOME</h1></a></li>
<li>enter order id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="od" id="od"  /></li>
<li><input type="button" name="odr" value="Submit" onClick="order();" /></li>
</div>
</ul>
<div id="cod"><form action='courier_update.php' method='get' name='f'></div>
</form>
</body>
</html>
<?php 
}}}
else
{ header("location:mainpage.php?t=0");
}
include("footer.php");
?>