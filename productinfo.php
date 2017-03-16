
<?php
include("header1.php");
include("dbconnect.php");
$pdid=$_REQUEST['t1'];	
$x=mysqli_query($con,"select * from product where ptdid='$pdid'");
while($row=mysqli_fetch_row($x))
{ echo "<div id='item'>";
echo "<div class='notf'><div class='new'>new</div>";
$ds1=mysqli_query($con,"select * from offer where pdtid=$row[0]");
$ds=mysqli_fetch_array($ds1);
if($ds[2]!=NULL)
{
echo "<div class='dis'>$ds[2]%</div>";
}
echo "</div>";
echo "<div id='img'>";
$pic=$row[8];
echo "<img width='300' height='300' src='.\\productlogo\\$pic'>";
echo "</div><ul>";
echo "<li><h1>";
echo $row[3];
echo "</h1></li>";
echo "<li>";
echo "price :- ";
if($ds[2]!=NULL)
{ $dp=$row[4]-($row[4]*$ds[2]/100);
echo "<strike>$row[4]/-</strike>&nbsp;<b>$dp/-</b>";
}
else
{
	echo "<b>".$row[4]."</b>";
}

echo "</li></br>";
$comp=mysqli_query($con,"select displayname from comapny where compid='$row[2]'");
$comp1=mysqli_fetch_array($comp);
echo "<li>company :- ".$comp1[0];
echo "</li></br><li>";
echo "feature :-".$row[7];
echo "</li></ul><table cellspacing='2' ><tr><td><form action='directbuy.php' method='get'><input type='hidden' value='$row[0]' name='t'><input type='submit' name='buy' value='BUY'></form></td></tr>";
echo "<tr><td><form action='addtocart.php' method='get'><input type='hidden' name='t' value='$row[0]'><input type='submit' name='addtocart' value='ADDTOCART'></from></td></tr></table>";
echo "</div>";
}
include("footer.php");
?>