<?php

$a=$_REQUEST['t1'];

include("dbconnect.php");
$noofcategory=mysqli_query($con,"select count(catid) from category where prim='$a'");
$noc1=mysqli_fetch_array($noofcategory);
$noc=$noc1[0];
echo"<H1 align='center'>CHOOSE CATEGORY</H1>
<h2 align='center'><a href='admin.php'>HOME</a></h2>";

if($noc1[0]==0)
{
		echo"<table align='center'>";
		echo"<tr><td>";
		echo"<a href='Insert_Item.php?product_id=$a'><h3>Insert Item Details</h3></a>";
	echo"</td></td>";
	echo"</table>";
	}
	
	else
	{echo"<form action='Category_Insert.php' method='get'>";

$ele=mysqli_query($con,"select catname from category where prim='$a'");

$catid=mysqli_query($con,"select catid from category where prim='$a'");
echo"<table align='center'>";
for($i=0;$i<$noc;$i++)
{$el=mysqli_fetch_array($ele);
$record=$el[0];
$cati=mysqli_fetch_array($catid);
$catrec=$cati[0];

	echo"<form action='Category_Insert.php' method='get'>";
echo"<tr><td><input type=radio button name='t1' value=".$catrec.">".$record."</input></td></tr>";
	
	$record++;
	}
		echo"</table>";
		echo"<table align='center'>";
		echo"<tr><td>";
	echo"<input type=submit value='ok'\>";
		echo"</td></td>";
	echo"</table>";
	}
		?>