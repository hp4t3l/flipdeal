<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<html>
<head><title>stock report</title>
<script>
function up(n)
{
	var pd = document.getElementById("i"+n.id).value;
	document.getElementById("d"+n.id).innerHTML="<input type='text' size='5' name='stk' id='stk"+n.id+"'>";
	document.getElementById("a"+n.id).innerHTML="<input type='button' value='OK' onclick='upd(this);' id='"+n.id+"'>";
}
function upd(u)
{
	var ust=document.getElementById("stk"+u.id).value;
	var pdt=document.getElementById("i"+u.id).value;
	if(ust!="")
	{
	document.getElementById("a"+u.id).innerHTML="<input type='button' value='update' onclick='up(this);' id='"+u.id+"'>";
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{
		
		if(x.readyState==4 && x.status==200)
		{	
			alert(x.readyState);
			document.getElementById("d"+u.id).innerHTML=x.responseText;
		}
	};
	x.open("GET","stock_up.php?t="+pdt+"&i="+ust,true);
	x.send();
	location.reload();
	}
	else
	{
		alert("empty");
		document.getElementById("stk"+u.id).focus();
	}
}

</script>
</head>
<body>
<h1 align="center">stock report</h1>
<h3 align="center"><a href="admin.php">HOME</a></h3>
<table align="center" border="1">
<form name="f">
<?php
include("dbconnect.php");
$ety1=mysqli_query($con,"select * from product where stock=0");
$i=0;
while($ety=mysqli_fetch_array($ety1))
{
	if($i==0)
	{
		echo "<tr bgcolor='red'><th colspan='5'><h2>Alert!!!<br>Stock Empty</h2></th></tr>";
		echo "<tr><th>s.no.</th><th>product image</th><th>product name</th><th>stock</th><th>update</th></tr>";
	}
	echo "<tr><td>".($i+1)."</td><td><img src='.\\productlogo\\$ety[8]' width='50' height='50'></td><td>$ety[3]</td>";
	echo "<td><div id='d$i'>$ety[5]</div></td><div><td><input type='hidden' value='$ety[0]' name='id' id='i$i'><div id='a$i'><input type='button' value='update' onclick='up(this);' id='$i'><div></td></tr>";
	$i++;
}
?>
</table>
<table align="center" border="1">

<?php
 $st1=mysqli_query($con,"select * from product where stock<>0");
$j=0;
while($st=mysqli_fetch_array($st1))
{
	if($j==0)
	{
		echo "<tr bgcolor='#0066FF'><th colspan='5'><h2>Stock</h2></th></tr>";
		echo "<tr><th>s.no.</th><th>product image</th><th>product name</th><th>stock</th><th>update</th></tr>";
	}
	echo "<tr><td>".($j+1)."</td><td><img src='.\\productlogo\\$st[8]' width='50' height='50'></td><td>$st[3]</td>";
	echo "<td><div id='d$i'>$st[5]<div></td><td><input type='hidden' value='$st[0]' name='id' id='i$i'><div id='a$i'><input type='button' value='update' onclick='up(this);' id='$i'></div></td></tr>";
	$j++;
	$i++;
}}
?>
</form>
</table>
</body>
</html>