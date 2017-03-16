<?php
$id=$_REQUEST['h'];
$r=$_REQUEST['c'];
$a=time();
echo $id."<br>".$r."<br>".$a;
include("dbconnect.php");
mysqli_query($con,"insert into `return`(`orderid`,`reason`,`date_al`,`status`) values($id,'$r',$a,'napvr')") or die("return");
mysqli_query($con,"update `order` set `status`='return requested' where orderid=$id");
header("location:ordershow.php");
?>