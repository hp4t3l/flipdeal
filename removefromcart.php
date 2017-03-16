<?php 
$a=$_REQUEST['t'];
include("dbconnect.php");
mysqli_query($con,"delete from cart where cartid='$a'");
echo "removed ".$a;
?>