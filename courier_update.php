<?php
$s=$_REQUEST['status'];
$t=time();
$id=$_REQUEST['a'];
include("dbconnect.php");
mysqli_query($con,"update `order` set `status`='$s' where orderid=$id") or die("update s");
$p1=mysqli_query($con,"select payid from `order` where orderid=$id") or die("uppay");
$p=mysqli_fetch_array($p1);
mysqli_query($con,"update cod set `status`='$s',dil_date=$t where orderid=$id") or die("codup");
if($s=='delivered')
{
	$k="successfull";
}else if($s=='rejected')
{
	$k="unsuccessfull";
}else 
{
	$k="pending";
}
mysqli_query($con,"update payment set status='$k' where payid=$p[0]") or die("pay");
//header("location:cod_details.php?t=$id");
?>
<link rel="stylesheet" href="style.css" type="text/css" />
<?php
//include("dbconnect.php");
$a=$_REQUEST['a'];
$oc1=mysqli_query($con,"select payment.paymode,payment.amount,`order`.date_time,`order`.`status`,`order`.userid from payment left join `order` on `order`.payid=payment.payid where `order`.orderid=$a");
$oc=mysqli_fetch_array($oc1);
if($oc[0]=="cod")
{
$o1=mysqli_query($con,"select `order`.date_time,`order`.userid,cod.amount,cod.`status` from `order` left join cod on `order`.orderid=cod.orderid where `order`.orderid=$a");
$o=mysqli_fetch_array($o1);
}
echo "<div class='uli'><ul><li>";
	echo"<table><tr>";
	$u1=mysqli_query($con,"select fname,lname,uemail,address,pincode,mob from user_regi where uid=$oc[4]");
	$u=mysqli_fetch_array($u1);
	echo "<th>Name</th><td>$u[0]&nbsp;$u[1]</td></tr>";
	echo "<tr><th>Email</th><td>$u[2]</td></tr>";
	echo "<tr><th>Mobile</th><td>$u[5]</td></tr>";
	echo "<tr><th>Address</th><td>$u[3]&nbsp;-$u[4]</td></tr>";
	if($oc[0]=="cod")
	{
	echo "<tr><th>Order</th><td>".date("Y-m-d",$o[0])."</td></tr>";
	echo "<tr><th>Amount</th><td>$o[2]</td></tr>";
	echo "<tr><th>Status</th><td>$o[3]</td></tr>";
	}
	else
	{
	echo "<tr><th>Order</th><td>".date("Y-m-d",$oc[2])."</td></tr>";
	echo "<tr><th>Amount</th><td>$oc[1]</td></tr>";
	echo "<tr><th>Status</th><td>$oc[3]</td></tr>";
	}
echo "</li></ul></div>";
?>
