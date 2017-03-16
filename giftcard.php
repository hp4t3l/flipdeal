<?php include("header1.php");?>
<?php if(!isset($_SESSION['uid']))
{
	 if(!isset($_SESSION['user']))
{   
header("location:login.php");
}else
{ 
 if($_SESSION['utype']=="admin")
 {
	header("location:admin.php"); 
 }else if($_SESSION['utype']=="courier")
 {
	header("location:courier.php"); 
 }
 else
 {
	 header("location:login.php");
 }

}
}
else
{
	 ?>
 <div class="guli"><ul><li><div>
<form action="giftcodegent.php" method="get">
<table align="center" border="0" cellspacing="10">
<tr><th colspan="2" align="center">GIFT CARD</th></tr>
<tr><th>AMOUNT</th><td><input type="text" name="a"  /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" /></td></tr>
</table></div>
</form><li>
<?php
include("dbconnect.php");
$gift=("FG00".$uid);
$ng1=mysqli_query($con,"select count(*) from giftcode where gift_code='$gift'");
$ng=mysqli_fetch_array($ng1);
?>
<li><table align="center" border='0' cellspacing="10">
<tr><th>s. no.</th><th>GIFT CODE</th><TH>GIFT PASS</TH><TH>AMOUNT</TH><TH>BALANCE</TH><TH>STATUS</TH></tr>
<?PHP
$g1=mysqli_query($con,"select * from giftcode where gift_code='$gift'");
for($i=0;$i<$ng[0];$i++)
{
	
$g=mysqli_fetch_array($g1);
	echo "<tr><td>".($i+1)."</td><td>$g[1]</td>";
	echo "<td>$g[6]</td><td>$g[4]</td><td>$g[5]</td><td>$g[7]</td></tr>";
}
echo "</table></li>";
echo "</ul></div>";
}
include("footer.php");
?>