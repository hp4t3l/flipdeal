<?php
include("dbconnect.php");
include("header1.php");
$t=$_REQUEST['t'];
$o1=mysqli_query($con,"select * from `order` where orderid=$t");
$o=mysqli_fetch_array($o1);
$p1=mysqli_query($con,"select * from payment where payid=$o[5]");
$p=mysqli_fetch_array($p1);
echo "<div class='uli'><ul><li><h3>RETURN REQUEST FORM</h3></li>";
echo "<li>ORDER ID - &nbsp;&nbsp;&nbsp;&nbsp;$o[0]</li>";
echo "<li>ORDER DATE - &nbsp;&nbsp;&nbsp;&nbsp;".date("Y-m-d",$o[3])."</li>";
echo "<li>PAYMODE - &nbsp;&nbsp;&nbsp;&nbsp;$p[1]</li>";
if($p[1]=="cod")
{ $c1=mysqli_query($con,"select * from cod where codid=$p[3]");
$c=mysqli_fetch_array($c1);
echo "<li>AMOUNT - &nbsp;&nbsp;&nbsp;&nbsp;$c[3]/-</li>";
}
else
{
echo "<li>AMOUNT - &nbsp;&nbsp;&nbsp;&nbsp;$p[6]/-</li>";
}
$itm1=mysqli_query($con,"select * from`no.of.item` where orderid=$t");
while($itm=mysqli_fetch_array($itm1))
{
	$pr1=mysqli_query($con,"select * from product where ptdid=$itm[2]");
	$pr=mysqli_fetch_array($pr1);
	echo "<li><img src='.\\productlogo\\$pr[8]' width='50' height='50'>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;$pr[3]&nbsp;&nbsp;&nbsp;&nbsp;$pr[4]";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;$itm[4]%&nbsp;&nbsp;&nbsp;&nbsp;$itm[3]</li>";
}
echo "<li><form action='return_item.php' method='get'>Reason&nbsp;&nbsp;&nbsp;<input type='hidden' value='$t' name='h'><textarea name='c' rows='3' cols='30'></textarea></li><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='ordershow.php'><input type='button' value='back'></a> ";
echo "</ul></div>";
?>