<?php
//$order1=mysqli_query($con,"select * from order where userid='$uid' and date_time='$a'");
			$order1=mysqli_query($con,"SELECT * FROM `order` WHERE `userid`='$uid' and `date_time`='$a'");
			$order=mysqli_fetch_array($order1);
			$pay1=mysqli_query($con,"select * from payment where payid='$order[5]' and date_time='$a'");
			$pay=mysqli_fetch_array($pay1);
			$cod1=mysqli_query($con,"select * from cod where orderid='$pay[3]' and date_time='$a'");
			$cod=mysqli_fetch_array($cod1);
	echo "<table align='center' border='1'><tr><th colspan='5'>INVOICE</th></tr><tr><th>ORDER ID</th><TD aling='center' colspan='4'>".$order[0]."</td></tr>";
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
		echo "<td align='center'>".$item[3]."</td></tr>";
				
	}
	mysqli_query($con,"delete from cart where userid='$uid'");
?>
<tr><td align="center" colspan="5"><form action="mainpage.php" method="get">
<input type="hidden" name="t" value="0" />
<input type="submit" value="CONTINUE TO SHOPPING" />
</form></td></tr>
