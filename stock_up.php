<?php
include("dbconnect.php");
$p=$_REQUEST['t'];
$i=$_REQUEST['i'];
mysqli_query($con,"update `product` set `stock`=$i where `ptdid`=$p");
$pd1=mysqli_query($con,"select `stock` from `product` where `ptdid`=$p");
$pd=mysqli_fetch_array($pd1);
//echo "<td><input type='text' value='$pd[0]' name='s'></td><td><input type='hidden' value='x' name='id' id='i$i'><input type='button' value='OK' onclick='od(this);' id='$i'></td>"; 
echo $pd[0];
?>