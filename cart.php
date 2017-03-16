<?php include("header1.php");
if(!isset($_SESSION['uid']))
{
	if(isset($_SESSION['utype']))
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
	}else
 {
	 header("location:login.php");
 }

	}
else
{ 
?><?php
	echo "<table align='center'  border='0' cellspacing='35'>";
include("dbconnect.php");
	if(isset($_SESSION['user']))
{
	$uid=$_SESSION['uid'];
$total=0;


	$n=mysqli_query($con,"select count(*) from cart where userid='$uid'");
$n1=mysqli_fetch_array($n);
$db1=mysqli_query($con,"select cartid from cart where `status`='yes' and userid=$uid");
while($db=mysqli_fetch_array($db1))
{
	mysqli_query($con,"update cart set `status`='no' where cartid=$db[0]");
}
$x=mysqli_query($con,"select cart.ptdid,quantity,companyid,pdtname,price,pdtimage,cartid from cart left join product on cart.ptdid=product.ptdid where cart.userid='$uid';");
?>
<head>
<link rel="stylesheet" href="style.css" type="text/css" />
<script>
function checkq(mn)
{
	var s=document.getElementById(mn.id).value;
	var id=document.getElementById("h"+mn.id).value;
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{
		
		if(x.readyState==4 && x.status==200)
		{
			document.getElementById("g"+mn.id).innerHTML=x.responseText;
		}
		};
		x.open("GET","quantity_update.php?t="+ s +"&x="+ id,true);
		x.send();
		location.reload();
}
function removecart(r)
{
	var rid=document.getElementById(r.id).value;
	var id=document.getElementById("r"+r.id).value;
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{ 
		if(x.readyState==4 && x.status==200)
		{
			document.getElementById("re").innerHTML=x.responseText;
		}};
		x.open("GET","removefromcart.php?t="+ id,true);
		x.send();
		location.href="cart.php";

}
</script></head>


<tr><th id="no_item" bgcolor="#00CCFF" colspan="9"><?php echo "cart(".$n1[0].")"; ?></th></tr>
<tr><th>s no.</th><th colspan="2">item</th><th>quantity</th><th>price</th><th> discount</th><th>discount ptice</th><th>subtotal</th></tr>
<form name="f">
 <div id="re"></div>
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
   echo "<td>";
   echo "<input type='hidden' value='$x1[6]' id='h$i' name='h'>";
   echo "<select name='q' id='$i' onchange='checkq(this);'>";
     $maxq=mysqli_query($con,"select stock from product where ptdid='$x1[0]'");
   $maxq1=mysqli_fetch_array($maxq);
   for($j=1;$j<=$maxq1[0];$j++)
   {
	   if($j!=$x1[1])
	   {
	   echo "<option value='$j' >".$j."</option>";
	   }
	   else
	   {echo "<option value='$j' selected='selected'>".$j."</option>";}  
   }
   echo "</select><div id='g$i'></div></td>";
  echo "<td>".$x1[4]."/-</td>";
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

  $subtotal=$dp*$x1[1];
  echo "<td>".$subtotal."/-</td>";
  $total=$total+$subtotal;
  echo "<td>";
  echo "<input type='hidden' value='$x1[6]' name='t' id='r$i'>";
  echo "<input type='button' value='REMOVE' onclick='removecart(this);' id='$i'>";
  echo "</td></tr>";
}
}
else
{echo "<tr><th id='no_item' bgcolor='#00CCFF'>cart(0)</th></tr>";}
?>
</form>
<tr><td colspan="3" align="center">
<div id="total"><h1>total = <?php echo $total; ?></h1></div></td>
<td colspan="2" align="center">
<form action="mainpage.php" method="get">
<input type="hidden" name="t" value="0" />
<input type="submit" value="BACK" />
</form>
</td>
<td colspan="4" align="center">
<form action="buy.php" method="get">
<input type="submit" value="CONTINUE TO BUY" />
</form>
</td>
</tr>
</table>

<?php } include("footer.php"); ?>