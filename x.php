<?php
include("dbconnect.php");
$x=mysqli_query($con,"select count(*) from categori where prim='0'");
$q=mysqli_query($con,"select catname,catid from categori where prim='0'");
 
$x1=mysqli_fetch_array($x);
$x2=$x1[0];
echo $x2;
for($i=0;$i<$x2;$i++)
{
	$q1=mysqli_fetch_array($q);

	echo "</br>";
	echo $q1[0];
	echo "</br>";
	echo $q1[1];
	
	}



?>