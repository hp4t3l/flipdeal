
<?php 
$total=0;
include("header1.php");
include("dbconnect.php");
if(isset($_SESSION['uid']))
{ if(isset($_SESSION['user']))
{
$uinfo1=mysqli_query($con,"select * from user_regi where uid='$uid'");
$uinfo=mysqli_fetch_array($uinfo1);
?><div class="guli"><ul><li>
<table align="center" border="0" cellspacing="15">
<tr><td>user name</td><td><?php echo $uinfo[1]." ".$uinfo[2]; ?></td></tr>
<tr><td>rmail id</td><td><?php echo $uinfo[6]; ?></td></tr>
<tr><td>address</td><td><?php echo $uinfo[8]; ?></td></tr>
<tr><td>pincode</td><td><?php echo $uinfo[10]; ?></td></tr>
<tr><td>mobile no</td><td><?php echo $uinfo[11]; ?></td>
</tr>
<tr><td colspan="2" align="center"><a href="profile.php"><input type="button" value="edit" /></a></td></tr>
</table></li></ul></div>
<?php }} ?>
<table align="center"  border="0" cellspacing="40">
<?php
if(isset($_SESSION['uid']))
{if(isset($_SESSION['user']))
{$n=mysqli_query($con,"select count(*) from cart where userid='$uid'");
$n1=mysqli_fetch_array($n);
$x=mysqli_query($con,"select cart.ptdid,quantity,companyid,pdtname,price,pdtimage,cartid from cart left join product on cart.ptdid=product.ptdid where cart.userid='$uid';");
?>
<tr><th id="no_item" bgcolor="#00CCFF" colspan="8"><h1><?php echo "Buy(items&nbsp;".$n1[0].")"; ?></h1></th></tr>
<tr><th>s no.</th><th colspan="2">item</th><th>quantity</th><th>price</th><th>discount</th><th>discount ptice</th><th>subtotal</th></tr>
<?php
for($i=0;$i<$n1[0];$i++)
{ $x1=mysqli_fetch_array($x);
  $comp=mysqli_query($con,"select displayname from comapny where compid='$x1[2]'");
  $comp1=mysqli_fetch_array($comp);
  echo "<tr><td>".($i+1)."</td>";
  echo "<td>";
  echo "<img width='100' height='100' src='.\\productlogo\\$x1[5]'>";
  echo "</td>";
  echo "<td>";
  echo $x1[3]."</br>company -".$comp1[0];
   echo "<td>".$x1[1]."</td>";
   echo "<td>".$x1[4]."</td>";
   $ds1=mysqli_query($con,"select * from offer where pdtid=$x1[0]");
  $ds=mysqli_fetch_array($ds1);
  $a=time();
$da1=date("Y-m-d",$a);
$da3=date_create($da1);
$da2=date("Y-m-d",$ds[4]);
$da4=date_create($da2);
$df=date_diff($da4,$da3);
$s=$df->format("%a");
  if($ds[2]!=NULL)
{
	if($ds[3]>$s)
	{ 
$dp=$x1[4]-($x1[4]*$ds[2]/100);
echo "<td>$ds[2]%</td>";
echo "<td>$dp/-</td>";
}
else
{
	$dp=$x1[4];
	echo "<td>----</td><td>----</td>";
}
}
else
{
	$dp=$x1[4];
	echo "<td>----</td><td>----</td>";
}


/*   $ds1=mysqli_query($con,"select * from offer where pdtid=$x1[0]");
  $ds=mysqli_fetch_array($ds1);
  if($ds[2]!=NULL)
{ $dp=$x1[4]-($x1[4]*$ds[2]/100);
echo "<td>$ds[2]%</td>";
echo "<td>$dp/-</td>";
}
else
{
	$dp=$x1[4];
	echo "<td>----</td><td>----</td>";
}*/

  $subtotal=$dp*$x1[1];

   //echo "<td>".$x1[4]."/-</td>";
  $subtotal=$dp*$x1[1];
  echo "<td>".$subtotal."/-</td>";
  $total=$total+$subtotal;
  /*echo "<td>";
  echo "<form action='removefromcart.php' method='get'>";
  echo "<input type='hidden' value='$x1[6]' name='t' id='t'>";
  echo "<input type='submit' value='REMOVE'>";
  echo "</form></td></tr>";*/
}
}
else
{echo "<tr><th id='no_item' bgcolor='#00CCFF'>cart(0)</th></tr>";
}}
?>
<tr><td colspan="5" align="left">
<div id="total"><h1>total payable amount <?php echo "(".$n1[0]."item) ";?> </h1></td><td colspan="3" align="right"><h1><?php echo $total; ?>/-</h1></div></td></tr>
<td colspan="8" align="center">
<form action="paymode.php" method="get">
<input type="submit" value="PAYMENT" />
</form>
</td>
</tr>
</table>

<?php include("footer.php"); ?>