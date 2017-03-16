<?php 
$a=$_REQUEST['catname'];
$b=$_REQUEST['cattype'];
$c=$_REQUEST['prim'];

include("dbconnect.php");
mysqli_query($con,"insert into category(catname,cattype,prim) values('$a','$b','$c')") ;
echo "Data Saved";
?> 