<?php include("header1.php"); 
$gid=$_REQUEST['g'];
$t=time();
$am=$_SESSION['am'];
include("dbconnect.php");
mysqli_query($con,"insert into payment(paymode,giftcode_id,date_time,status,amount) values('gift',$gid,$t,'process',$am)") or die("payment");
$payid1=mysqli_query($con,"select payid from payment where date_time=$t");
$payid=mysqli_fetch_array($payid1);
$ccart1=mysqli_query($con,"select count(*) from cart where userid=$uid") or die("count cart");
$ccart=mysqli_fetch_array($ccart1);
mysqli_query($con,"insert into `order`(`userid`,`no_of_item`,`date_time`,`status`,`payid`) values($uid,$ccart[0],$t,'pending',$payid[0])") or die("order");
$order1=mysqli_query($con,"select * from `order` where `date_time`=$t") or die("order1");
$order=mysqli_fetch_array($order1);
$cart1=mysqli_query($con,"select * from cart where userid=$uid") or die("cart");
for($i=0;$i<$ccart[0];$i++)
{
$cart=mysqli_fetch_array($cart1);
$ds1=mysqli_query($con,"select * from offer where pdtid=$cart[2]");
			$ds=mysqli_fetch_array($ds1);
			$a=time();
$da1=date("Y-m-d",$a);
$da3=date_create($da1);
$da2=date("Y-m-d",$ds[4]);
$da4=date_create($da2);
$df=date_diff($da4,$da3);
$s=$df->format("%a");
			if($ds[2]!=NULL)
			{
				if($ds[3]>$s)
				{	
					//mysqli_query($con,"insert into `no.of.item`(`orderid`,`productid`,`quantity) values('$oid[0]','$d[0]','$d[1]')");
			mysqli_query($con,"INSERT INTO `no.of.item`(`orderid`, `productid`, `quantity`,`discount`) VALUES ('$order[0]','$cart[2]','$cart[3]',$ds[2])");
				}
				else
			{
mysqli_query($con,"insert into `no.of.item`(`orderid`,`productid`,`quantity`) values($order[0],$cart[2],$cart[3])") or die("no of item");
			}
			}
			else
			{
mysqli_query($con,"insert into `no.of.item`(`orderid`,`productid`,`quantity`) values($order[0],$cart[2],$cart[3])") or die("no of item");
			}
$stock1=mysqli_query($con,"select stock from product where ptdid=$cart[2]") or die("stcok fecth");
$stock=mysqli_fetch_array($stock1);
$st=$stock[0]-$cart[3];
mysqli_query($con,"update product set stock=$st where ptdid=$cart[2]") or die("update stock");
}
mysqli_query($con,"update giftcode set payid=$payid[0],orderid=$order[0] where giftid=$gid");
			$order1=mysqli_query($con,"SELECT * FROM `order` WHERE `userid`='$uid' and `date_time`=$t");
			$order=mysqli_fetch_array($order1);
			$pay1=mysqli_query($con,"select * from payment where payid='$order[5]' and date_time=$t");
			$pay=mysqli_fetch_array($pay1);
			$gift1=mysqli_query($con,"select * from `giftcode` where `giftid`=$pay[2]");
			$gift=mysqli_fetch_array($gift1);
	echo "<table align='center' border='0' cellspacing='30'><tr><th colspan='5'><h1 align='center'>INVOICE</h1></th></tr><tr><th>ORDER ID</th><TD aling='center' colspan='4'>".$order[0]."</td></tr>";
	echo "<tr><th>DATE</TH><td aling='center' colspan='4'>".date("Y-m-d",$order[3])."</td></tr>";
	echo "<tr><th>ORDER STATUS</th><td aling='center' colspan='4'>".$order[4]."</td></tr>";
	echo "<tr><th>PAYMODE</th><td aling='center' colspan='4'>".$pay[1]."</td></tr>";
	echo "<tr><th>PAY-STATUS</th><td aling='center' colspan='4'>".$pay[5]."</td></tr>";
	echo "<tr><th>AMOUNT</th><td aling='center' colspan='4'>".$pay[6]."</td></tr>";
	echo "<tr><th>GIFT CODE</TH><td aling='center' colspan='4'>".$gift[1]."</td></tr>";
	echo "<tr><th>GIFT PASS</TH><td aling='center' colspan='4'>".$gift[6]."</td></tr>";
	echo "<tr><th>GIFT BAL</TH><td aling='center' colspan='4'>".$gift[5]."</td></tr>";
	echo "<tr><th>GIFT-STATUS</th><td aling='center' colspan='4'>".$gift[7]."</td></tr>";
	$item1=mysqli_query($con,"SELECT * FROM `no.of.item` WHERE `orderid`='$order[0]'");
	echo "<tr><th rowspan='$ccart[0]'>ITEM -</th>";
	for($k=0;$k<$ccart[0];$k++)
	{
		if($k!='0')
		{
			echo "<tr>";
		}
		$item=mysqli_fetch_array($item1);
		$ptd1=mysqli_query($con,"select pdtname,pdtimage from product where ptdid='$item[2]'");
		$ptd=mysqli_fetch_array($ptd1);
		echo "<td><img width='80px' height='80px' src='.\\productlogo\\$ptd[1]'></td>";
		echo "<td align='center'>".$ptd[0]."</td>";
		echo "<td align='center'>".$item[3]."</td>";
		echo "<td align='center'>".$item[4]."</td></tr>";
				
	}
	mysqli_query($con,"delete from cart where userid='$uid'");
?>
<tr><td align="center" colspan="5"><form action="mainpage.php" method="get">
<input type="hidden" name="t" value="0" />
<input type="submit" value="CONTINUE TO SHOPPING" />
</form></td></tr></table>
<?php include("footer.php");?>