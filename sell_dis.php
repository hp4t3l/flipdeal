<html>
<head><title>stock report</title>
<script>
function call(d)
{
	alert(d.id);
	var x = XMLHttpRequest();
	alert(x.readyState);
	x.onreadystatechange=function()
	{
		if(x.readyState==4 && x.status==200)
		{
			document.getElementById("dis").innerHTML=x.responseText;
		}
	};
	x.open("GET","sell_dis.php?i="+d.id,true);
	x.send();
}
</script>
</head>
<body>
<h1 align="center">stock report</h1>
<h3 align="center"><a href="admin.php">HOME</a></h3>
<?php
include("dbconnect.php");
$ts1=mysqli_query($con,"select * from `order` left join payment on `order`.payid=payment.payid where `order`.`status`='delivered' ");
$totalsale=0;
while($ts=mysqli_fetch_array($ts1))
{
	if($ts[8]=="cod")
	{ $cd1=mysqli_query($con,"select amount from `cod` where orderid=$ts[0] and payid=$ts[5]");
		$cd=mysqli_fetch_array($cd1);
		$totalsale=$totalsale+$cd[0];
	}
	else
	{
		$totalsale=$totalsale+$ts[13];
	}
}
$cpo1=mysqli_query($con,"select count(*) from `order` left join payment on `order`.payid=payment.payid where `order`.`status`='pending' ");
$cco1=mysqli_query($con,"select count(*) from `order` left join payment on `order`.payid=payment.payid where `order`.`status`='cencel' ");
$cro1=mysqli_query($con,"select count(*) from `order` left join payment on `order`.payid=payment.payid where `order`.`status`='rejected' ");
$cpo=mysqli_fetch_array($cpo1);
$cco=mysqli_fetch_array($cco1);
$cro=mysqli_fetch_array($cro1);

?>
<table align="center" border="0" cellspacing="20">
<tr><th colspan="3" bgcolor="#33FFCC">SELLS</th></tr>
<tr><th>Total Sells</th><td><?php echo $totalsale; ?>/-</td><td><a href="sell_dis.php?i=1" onclick="call(this);" id="1">detalis...</a></td></tr>
<tr><th>Order Pending</th><td><?php echo $cpo[0]; ?></td><td><a href="#" onclick="call(this);" id="2">detalis...</a></td></tr>
<tr><th>Order Cenceled</th><td><?php echo $cco[0]; ?></td><td><a href="#" onclick="call(this);" id="3">detalis...</a></td></tr>
<tr><th>Order Rejected</th><td><?php echo $cro[0]; ?></td><td><a href="#" onclick="call(this);" id="4">detalis...</a></td></tr>
</table>


<?php

echo "<table align='center'>
<tr><th>s.no.</th><th>Order id</th><th>order date</th><th>user</th><th>no of item</th><th>amount</th><th>paymode</th><th>payment status</th><th>dilevery date</th><th>order status</th></tr>";


include("dbconnect.php");
$i=$_REQUEST['i'];
if($i==1)
{
	$x=0;
	$ts1=mysqli_query($con,"select * from `order` left join payment on `order`.payid=payment.payid where `order`.`status`='delivered' ");
	while($ts=mysqli_fetch_array($ts1))
	{
		echo "<tr><td>".($x+1)."</td><td>$ts[0]</td><td>".date("Y-m-d",$ts[3])."</td><td>";
		$u1=mysqli_query($con,"select fname,lname from user_regi where uid=$ts[1]");
		$u=mysqli_fetch_array($u1);
		echo $u[0]." ".$u[1]."</td><td>$ts[2]</td><td>";
		if($ts[8]=="cod")
		{
			$cd1=mysqli_query($con,"select amount,dil_date from `cod` where orderid=$ts[0] and payid=$ts[5]");
		$cd=mysqli_fetch_array($cd1);
		echo $cd[0];
		}
		else
		{
			echo $ts[13];
		}
		echo "</td><td>$ts[8]</td><td>$ts[12]</td><td>$cd[1]</td><td>$ts[4]</td></tr>";
	}
}
echo "</table>";
?>
