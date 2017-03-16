<?php
$x=$_REQUEST['t'];
include("dbconnect.php");
mysqli_query($con,"update `order` set `status`='cencel' where `orderid`='$x'") or die("cencel");
mysqli_query($con,"update cod set `status`='cencel' where orderid=$x");
$p1=mysqli_query($con,"select payid from cod where orderid=$x");
$p=mysqli_fetch_array($p1);
mysqli_query($con,"update payment set `status`='cencel' where payid=$p[0]");
header("location:ordershow.php");
?>