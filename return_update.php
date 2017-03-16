<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>
<?php
include("dbconnect.php");
$r=$_REQUEST['r'];
$o=$_REQUEST['o'];
$s=$_REQUEST['s'];
mysqli_query($con,"update `return` set `status`='$s' where returnid=$r") or die("r");
if($s=="approved")
{
mysqli_query($con,"update `order` set `status`='$s',returnrq=$r where orderid=$o") or die("o1");
$p1=mysqli_query($con,"update `payment` set `status`='unsucessfull' where payid IN(select payid from `order` where orderid=$o)") or die("pay");

}
else
{
mysqli_query($con,"update `order` set `status`='delivered',returnrq=$r where orderid=$o") or die("od");
}
header("location:return_report.php");
}
?>