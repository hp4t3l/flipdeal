<?php include("dbconnect.php"); include("header1.php");
if(isset($_SESSION['user']))
{ if(isset($_SESSION['uid']))
{{
	$gf=$_REQUEST['gp'];
	$gc=$_REQUEST['gc'];
	$gcu=("FG00".$uid);
	//if($gf==$gcu)
	{
		$c1=mysqli_query($con,"select count(*) from giftcode where date=$gf") or die("fuck");
		$c=mysqli_fetch_array($c1);
		if($c[0]>0)
		{
			$gid1=mysqli_query($con,"select giftid,amount,bal from giftcode where date=$gf");
			$gid=mysqli_fetch_array($gid1);
			$noofitem1=mysqli_query($con,"select count(*) from cart left join product on cart.ptdid=product.ptdid where cart.userid='$uid' and cart.`status`='yes' ;");
			$noofitem=mysqli_fetch_array($noofitem1);
			$d1=mysqli_query($con,"select cart.ptdid,quantity,product.price,cartid from cart left join product on cart.ptdid=product.ptdid where cart.userid='$uid' and cart.`status`='yes';");
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
		$_SESSION['am']=$amount;
		if($amount<=$gid[1])
		{ if($gid[2]==NULL)
			{
				$bal=$gid[1]-$amount;
				
				mysqli_query($con,"update giftcode set bal=$bal where giftid=$gid[0]") or die("udate ba");
				header("location:dgift.php?g=$gid[0]");
				
			}
			else
			{
				if($amount<=$gid[2])
				{ 
					$bal=$gid[2]-$amount;
					mysqli_query($con,"update giftcode set bal=$bal where giftid=$gid[0]") or die("udate ba");
					header("location:dgift.php?g=$gid[0]");
				}
				else
				{
				 echo "<p align='center'><h1>OOPS!!! GIFT CARD BALANCE IS NOT SUFFICIENT TO PLACE ORDER CHOOSE ANOTHER OPITION</h1><br><a herf='payment.php'><input type='button' value='back'></a></p>";   
				}
			}
		}
		else
		{	
			 echo "<p align='center'><h1>OOPS!!! GIFT CARD BALANCE IS NOT SUFFICIENT TO PLACE ORDER CHOOSE ANOTHER OPITION</h1><br><a herf='payment.php'><input type='button' value='back'></a></p>";   
		}
		}
			else
			{	echo "<p align='center'><h1>OOPS!!! WRONG GIFT CODE</h1><br><a herf='payment.php'><input type='button' value='back'></a></p>";
			}
	}

}}}
?>