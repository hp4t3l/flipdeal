<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>
<html>
<head><title>return request</title>
<script>
function rt(n)
{
	var s=document.getElementById("s"+n.id).value;
	var rid=document.getElementById("r"+n.id).value;
	var oid=document.getElementById("o"+n.id).value;
	location.href="return_update.php?r="+rid+"&o="+oid+"&s="+s;
}
</script>
</head>
<body>
<h1 align="center">return request</h1>
<h3 align="center"><a href="admin.php">HOME</a></h3>
<table border="1" align="center">
<tr bgcolor="#0099FF"><th>s.no.</th><th>item</th><th>order date</th><th>retrun request date</th><th>reason</th><th>status</th><th>submit</th></tr>
<?php
include("dbconnect.php");
$napr1=mysqli_query($con,"select * from `return` order by returnid desc");
$i=1;
while($napr=mysqli_fetch_array($napr1))
{
	echo "<tr><td>$i</td><td><ul>";
	$o1=mysqli_query($con,"select * from `order` where orderid=$napr[1]");
	$o=mysqli_fetch_array($o1);
	$it1=mysqli_query($con,"select * from `no.of.item` where orderid=$napr[1]");
	while($it=mysqli_fetch_array($it1))
	{
		$pr1=mysqli_query($con,"select * from product where ptdid=$it[2]");
	$pr=mysqli_fetch_array($pr1);
	echo "<li><img src='.\\productlogo\\$pr[8]' width='50' height='50'>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;$pr[3]&nbsp;&nbsp;&nbsp;&nbsp;$pr[4]";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;$it[4]%&nbsp;&nbsp;&nbsp;&nbsp;$it[3]</li>";
	}
	echo "</ul></td><td>".date("Y-m-d",$o[3])."</td><td>".date("Y-m-d",$napr[3])."</td><td>$napr[2]</td><td>";
	echo "<input type='hidden' value='$napr[0]' id='r$i'><input type='hidden' value='$napr[1]' id='o$i'>";
	if($napr[4]=="napvr")
	{
		echo "<select name='s' id='s$i'>";
		echo "<option value='approved'>approve</option>";
		echo "<option value='request denied'>deny</option></select>";
	}
    else
    {
        echo $napr[4];
    }
	echo "</td><td><input type='button' value='submit' id='$i' onclick='rt(this)'></td></tr>";
	$i++;
}}
?>

</table>
</body>
</html>