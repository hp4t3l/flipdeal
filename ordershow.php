<head>
<script>
function cencelo(d)
{
	var x=document.getElementById("h"+d.id).value;
	location.href="cencelorder.php?t="+x;
}
function returno(r)
{
	var x=document.getElementById("h"+r.id).value;
	location.href="returnorder.php?t="+x;
}
</script>
</head>


<?php include("header1.php");
include("dbconnect.php");
$uid=$_SESSION['uid'];
//echo $uid;
$order1=mysqli_query($con,"SELECT * FROM `order` left join `payment` on order.payid=payment.payid and order.date_time=payment.date_time where order.userid=$uid order by orderid desc;") or die("order");
$corder1=mysqli_query($con,"select count(*) from `order` where `userid`=$uid") or die("xo");
$corder=mysqli_fetch_array($corder1);
echo "<div class='ouli'><ul>";
for($i=0;$i<$corder[0];$i++)
{
	$order=mysqli_fetch_array($order1);
	//echo "<br>".$order[0]."<br>".$order[5];
echo "<li><tr><table align='center' border='0' cellspacing='15'><tr>";
$a=time();
$d1=date("Y-m-d",$a);
$d3=date_create($d1);
$d2=date("Y-m-d",$order[3]);
$d4=date_create($d2);
$df=date_diff($d4,$d3);
$s=$df->format("%a");
echo "<th>".($i+1)."</th><th>ORDER ID -</th><td>$order[0]</td><th>ORDER DATE</th><td>".date("Y-m-d",$order[3])."&nbsp;&nbsp;</td>";
if($order[4]!="cencel")
{
if($order[4]!="delivered")
{
		if($order[4]!="return requested")
		{
	
echo "<td><input type='hidden' value='$order[0]' id='h$i'><input type='button' value='CENCEL' id='$i' onclick='cencelo(this);'></tr>";
}}
else
{
	if($s<7)
	{
		if($order[4]!="return requested")
		{
	echo "<td><input type='hidden' value='$order[0]' id='h$i'><input type='button' value='RETURN' id='$i' onclick='returno(this);'></tr>";
		}
	}
}
}
if($order[9]==NULL)
{ //echo "<br>".$order[0]."<br>".$order[5];
$cod1=mysqli_query($con,"SELECT * FROM `cod` WHERE codid=$order[10]") or die("fuck");
	$cod=mysqli_fetch_array($cod1);
	echo "<tr><th>GRANT TOTAL</TH><TD>$cod[3]</TD><TH>ORDER STATUS</TH><TD>$order[4]</TD></TR>";
	echo "<tr><th>PAYMODE</TH><TD>$order[8]</TD><TH>PAYMENT STATUS</TH><TD>$order[12]</TD></TR>";
	echo "<tr><TH>COD STATUS</TH><TD>$cod[4]</TD></TR>";
}
else
{
	$gift1=mysqli_query($con,"select * from `giftcode` where giftid=$order[9]") or die("gift");
	$gift=mysqli_fetch_array($gift1);
	echo "<tr><th>GRANT TOTAL</TH><TD>";
	if($order[13]==NULL)
	{ echo "------";}
	else
	{
	echo $order[13];
	}
	echo "</TD><TH>ORDER STATUS</TH><TD>$order[4]</TD></TR>";
	echo "<tr><th>PAYMODE</TH><TD>$order[8]</TD><TH>PAYMENT STATUS</TH><TD>$order[12]</TD></tr>";
	echo "<tr><th>GIFT CODE</TH><TD>$gift[1]</TD><TH>GIFT PASS</TH><TD>$gift[6]</TD></TR>";
}
$item1=mysqli_query($con,"select * from `no.of.item` left join `product` on `no.of.item`.productid=product.ptdid where orderid=$order[0]") or die("nitem");
//echo "<BR>".$order[0];
$citem1=mysqli_query($con,"SELECT count(*) FROM `no.of.item` WHERE orderid=$order[0]") or die("item");
$citem=mysqli_fetch_array($citem1);
echo "<tr><th rowspan='$citem[0]'>item($citem[0])</th><td>";
for($j=0;$j<$citem[0];$j++)
{
	$item=mysqli_fetch_array($item1);
	if($j!=0)
	{ echo "<tr><td>";}
	
	echo ($j+1)."</td><td><img width='50' height='50' src='.\\productlogo\\$item[13]'></td>";
	$comp1=mysqli_query($con,"select `displayname` from `comapny` where `compid`=$item[7]") or die("comp");
	$comp=mysqli_fetch_array($comp1);
	echo "<td><h3>$item[8]</h3><br>$comp[0]</td><td>$item[9]/-</td><td>$item[4]%</td><td>$item[3]</td></tr>";
}
if($citem[0]==0)
{ echo "</tr>";}
echo "</table></li>";
}
echo "</ul></div>";

include("footer.php");
?>
