<?php
$q=$_REQUEST['t'];
$cartid=$_REQUEST['x'];
include("dbconnect.php");
mysqli_query($con,"update cart set quantity='$q' where cartid='$cartid'");
echo "updated";
?>