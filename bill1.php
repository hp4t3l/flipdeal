<?php
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
			//mysqli_query($con,"insert into `no.of.item`(`orderid`,`productid`,`quantity) values('$oid[0]','$d[0]','$d[1]')");
			mysqli_query($con,"INSERT INTO `no.of.item`(`orderid`, `productid`, `quantity`) VALUES ('$oid[0]','$f[0]','$f[1]')");
			$stock1=mysqli_query($con,"select stock from product where ptdid=$f[0]") or die("stcok fecth");
$stock=mysqli_fetch_array($stock1);
$st=$stock[0]-$f[1];
mysqli_query($con,"update product set stock=$st where ptdid=$f[0]") or die("update stock");

			}
			mysqli_query($con,"update cod set orderid='$oid[0]' where codid='$updatepay[0]'");
			//mysqli_query($con,"update payment set status='sucessfull' where payid='$x[0]'");?>