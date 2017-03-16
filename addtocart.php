<?php session_start();
if(!isset($_SESSION['uid']))
{
	 if(!isset($_SESSION['user']))
{   
header("location:login.php");
}else
{ 
 if($_SESSION['utype']=="admin")
 {
	header("location:admin.php"); 
 }
 else
 {
	 header("location:login.php");
 }

}
}
else
{
$ptdid=$_REQUEST['t'];
include("dbconnect.php");
$userid=$_SESSION['uid'];
$x=mysqli_query($con,"select count(*) from cart where userid='$userid' and ptdid='$ptdid';");
$s=mysqli_query($con,"select stock from product where ptdid='$ptdid';");
$s1=mysqli_fetch_array($s);
$x1=mysqli_fetch_array($x);
if($s1[0]>0)
{
if($x1[0]=='0')
{
mysqli_query($con,"insert into cart(userid,ptdid,status,quantity) values('$userid','$ptdid','no','1');");
}
else
{ $w=mysqli_query($con,"select quantity from cart where userid='$userid' and ptdid='$ptdid';");
$w1=mysqli_fetch_array($w);
$w2=$w1[0]+1;
mysqli_query($con,"update cart set quantity='$w2' where userid='$userid' and ptdid='$ptdid';");
}
header("location:cart.php");
}
else
{ echo "sorry!!! out of stock";}
}
?>