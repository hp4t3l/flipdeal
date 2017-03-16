<?php
$a=$_REQUEST['t1'];

include("dbconnect.php");
$noofcategory=mysqli_query($con,"select count(catid) from category where prim='$a'");
$noc1=mysqli_fetch_array($noofcategory);
$noc=$noc1[0];
$ele=mysqli_query($con,"select catname from category where prim='$a'");

$catid=mysqli_query($con,"select catid from category where prim='$a'");
for($i=0;$i<$noc;$i++)
{$el=mysqli_fetch_array($ele);
$record=$el[0];
$cati=mysqli_fetch_array($catid);
$catrec=$cati[0];

	echo"<form action='cat_insert.php' method='get'>";
echo"<input type=radio button name='t1' value=".$catrec.">".$record."</input>";
	
	$record++;
	}
	
	echo"<input type=submit value='ok'\>";
		?>