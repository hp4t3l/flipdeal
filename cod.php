<?php
include("header1.php");
include("dbconnect.php");
if(isset($_SESSION['user']))
{
	if(isset($_SESSION['uid']))
	{
		$noofitem1=mysqli_query($con,"select count(*) from cart where userid='$uid'");
		$noofitem=mysqli_fetch_array($noofitem1);
		$d1=mysqli_query($con,"select cart.ptdid,quantity,product.price,cartid from cart left join product on cart.ptdid=product.ptdid where cart.userid='$uid';");
		
		$amount=0;$total=0;
		for($i=0;$i<$noofitem[0];$i++)
		{
			$d=mysqli_fetch_array($d1);
			$ds1=mysqli_query($con,"select * from offer where pdtid=$d[0]");
  			$ds=mysqli_fetch_array($ds1);
  			if($ds[2]!=NULL)
			{ $dp=$d[2]-($d[2]*$ds[2]/100);
			}
			else
			{
				$dp=$d[2];
			}

			$total=$d[1]*$dp;
			$amount=$amount+$total;
			}

		$a=time();
		mysqli_query($con,"insert into payment(paymode,status,date_time) values('cod','process','$a')"); 
		$x1=mysqli_query($con,"select payid from payment where date_time='$a'");
		$x=mysqli_fetch_array($x1);
		mysqli_query($con,"insert into cod(payid,amount,status,date_time) values('$x[0]','$amount','pending','$a')");
		$updatepay1=mysqli_query($con,"select codid from cod where date_time='$a'");
		$updatepay=mysqli_fetch_array($updatepay1);
		mysqli_query($con,"update payment set cod_id='$updatepay[0]' where payid='$x[0]'");
		//mysqli_query($con,"insert into order(userid,no_of_item,date_time,status,payid) values('$uid','$noofitem[0]','$a','pending','$x[0]')");
		mysqli_query($con,"INSERT INTO `order`(`userid`, `no_of_item`, `date_time`, `status`, `payid`) VALUES ('$uid','$noofitem[0]','$a','pending','$x[0]')");
		//$oid1=mysqli_query($con,"select orderid from order where userid='$uid' and date_time='$a' and payid='$x[0]'");
		$oid1=mysqli_query($con,"SELECT `orderid` FROM `order` WHERE `date_time`='$a' and `payid`='$x[0]' and `userid`='$uid'");
		
		$oid=mysqli_fetch_array($oid1);
		$f1=mysqli_query($con,"select cart.ptdid,quantity,product.price,cartid from cart left join product on cart.ptdid=product.ptdid where cart.userid='$uid';");
		$cf1=mysqli_query($con,"select count(*) from cart left join product on cart.ptdid=product.ptdid where cart.userid='$uid';");
		$cf=mysqli_fetch_array($cf1);
		for($j=0;$j<$cf[0];$j++)
		{
			$f=mysqli_fetch_array($f1);
			$ds1=mysqli_query($con,"select * from offer where pdtid=$f[0]");
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
			mysqli_query($con,"INSERT INTO `no.of.item`(`orderid`, `productid`, `quantity`,`discount`) VALUES ('$oid[0]','$f[0]','$f[1]',$ds[2])");
				}
				else
			{
			mysqli_query($con,"INSERT INTO `no.of.item`(`orderid`, `productid`, `quantity`) VALUES ('$oid[0]','$f[0]','$f[1]')");
			}
			}
			else
			{
			mysqli_query($con,"INSERT INTO `no.of.item`(`orderid`, `productid`, `quantity`) VALUES ('$oid[0]','$f[0]','$f[1]')");
			}
			$stock1=mysqli_query($con,"select stock from product where ptdid=$f[0]") or die("stcok fecth");
$stock=mysqli_fetch_array($stock1);
$st=$stock[0]-$f[1];
mysqli_query($con,"update product set stock=$st where ptdid=$f[0]") or die("update stock");

			}
			mysqli_query($con,"update cod set orderid='$oid[0]' where codid='$updatepay[0]'");
			//mysqli_query($con,"update payment set status='sucessfull' where payid='$x[0]'");
			//$order1=mysqli_query($con,"select * from order where userid='$uid' and date_time='$a'");
			$order1=mysqli_query($con,"SELECT * FROM `order` WHERE `userid`='$uid' and `date_time`='$a'");
			$order=mysqli_fetch_array($order1);
			$pay1=mysqli_query($con,"select * from payment where payid='$order[5]' and date_time='$a'");
			$pay=mysqli_fetch_array($pay1);
			$cod1=mysqli_query($con,"select * from `cod` where orderid=$order[0] and `date_time`='$a'");
			$cod=mysqli_fetch_array($cod1);
	echo "<table align='center' border='0' cellspacing='30'><tr><th colspan='5'><h1 align='center'>INVOICE</h1></th></tr><tr><th>ORDER ID</th><TD aling='center' colspan='4'>".$order[0]."</td></tr>";
	echo "<tr><th>DATE</TH><td aling='center' colspan='4'>".date("Y-m-d",$order[3])."</td></tr>";
	echo "<tr><th>ORDER STATUS</th><td aling='center' colspan='4'>".$order[4]."</td></tr>";
	echo "<tr><th>PAYMODE</th><td aling='center' colspan='4'>".$pay[1]."</td></tr>";
	echo "<tr><th>PAY-STATUS</th><td aling='center' colspan='4'>".$pay[5]."</td></tr>";
	echo "<tr><th>AMOUNT</th><td aling='center' colspan='4'>".$cod[3]."</td></tr>";
	echo "<tr><th>COD-STATUS</th><td aling='center' colspan='4'>".$cod[4]."</td></tr>";
	//$noitem1=mysqli_query($con,"select count(*) from no.of.item where orderid='$order[0]'");
	//$noitem=mysqli_fetch_array($noitem1);
	//$item1=mysqli_query($con,"select * from no.of.item where orderid=$order[0]'");
	$item1=mysqli_query($con,"SELECT * FROM `no.of.item` WHERE `orderid`='$order[0]'");
	echo "<tr><th rowspan='$noofitem[0]'>ITEM -</th>";
	for($k=0;$k<$noofitem[0];$k++)
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
<?php
		//include("bill.php");
			//include("bill1.php");
	}}
	
?>
<?php include("footer.php");?>