<script>
function checkq()
{
	var s=document.getElementById("q").value;
	var id=document.getElementById("f2").value;
	var f=document.getElementById("f1").value;
	var z=f*s;
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{
		
		if(x.readyState==4 && x.status==200)
		{
			document.getElementById("subtotal").innerHTML=x.responseText;
			document.getElementById("subtotal").innerHTML=z;
		}
		};
		x.open("GET","quantity_update.php?t="+ s +"&x="+ id,true);
		x.send();
		
	

}

</script>
<?php 
$total=0;
include("header1.php");
include("dbconnect.php");
if(isset($_SESSION['uid']))
{ echo "hi";
if(!isset($_SESSION['user']))
{ header("location:login.php");}
 else
 {
	 if($_SESSION['utype']!="general_user")
	 {
		 echo "hi";
		 	 }
	 else
	 {
$uinfo1=mysqli_query($con,"select * from user_regi where uid='$uid'");
$uinfo=mysqli_fetch_array($uinfo1);
?><div class="guli"><ul><li>
<table align="center" border="0" cellspacing="10">
<tr><td>user name</td><td><?php echo $uinfo[1]." ".$uinfo[2]; ?></td></tr>
<tr><td>email id</td><td><?php echo $uinfo[6]; ?></td></tr>
<tr><td>address</td><td><?php echo $uinfo[8]; ?></td></tr>
<tr><td>pincode</td><td><?php echo $uinfo[10]; ?></td></tr>
<tr><td>mobile no</td><td><?php echo $uinfo[11]; ?></td>
</tr>
<tr><td colspan="2" align="center"><a href=""><input type="button" value="edit" /></a></td></tr>
</table></li></ul></div>
<?php
$ptdid=$_REQUEST['t'];
$userid=$_SESSION['uid'];
$x=mysqli_query($con,"select count(*) from cart where userid='$userid' and ptdid='$ptdid';");
$s=mysqli_query($con,"select stock from product where ptdid='$ptdid';");
$s1=mysqli_fetch_array($s);
$x1=mysqli_fetch_array($x);
if($s1[0]>0)
{
if($x1[0]=='0')
{
mysqli_query($con,"insert into cart(userid,ptdid,status,quantity) values('$userid','$ptdid','yes','1');");
}
else
{ $w=mysqli_query($con,"select quantity from cart where userid='$userid' and ptdid='$ptdid';");
$w1=mysqli_fetch_array($w);
$w2=$w1[0]+1;
mysqli_query($con,"update cart set quantity='$w2',status='yes' where userid='$userid' and ptdid='$ptdid';");
}
//header("location:cart.php");
}
else
{ echo "sorry!!! out of stock";}
$cu1=mysqli_query($con,"select cart.ptdid,quantity,companyid,pdtname,price,pdtimage,cartid from cart left join product on cart.ptdid=product.ptdid where cart.userid='$uid' and product.ptdid='$ptdid' and cart.status='yes';");
$cu=mysqli_fetch_array($cu1);

?>
<table border="0" align="center" cellspacing="40">
<tr><th colspan="2">item</th><th>quantity</th><th>price</th><th> discount</th><th>discount ptice</th><th>subtotal</th></tr>
<?php
$comp=mysqli_query($con,"select displayname from comapny where compid='$cu[2]'");
  $comp1=mysqli_fetch_array($comp);
  echo "<tr><td><img width='100' height='100' src='.\\productlogo\\$cu[5]'></td>";
  echo "<td ><h1>".$cu[3]."</h1></br><h3>company = ".$comp1[0]."</h3></td>";
  echo "<td><select name='q'  id='q' onchange='checkq();' total();>";
     $maxq=mysqli_query($con,"select stock from product where ptdid='$cu[0]'");
   $maxq1=mysqli_fetch_array($maxq);
   for($j=1;$j<=$maxq1[0];$j++)
   {
	   if($j!=$cu[1])
	   {
	   echo "<option value='$j' >".$j."</option>";
	   }
	   else
	   {echo "<option value='$j' selected='selected'>".$j."</option>";}  
   }
   echo "</select></td>";
  echo "<td><input type='hidden' id='f2' value='$cu[6]'>".$cu[4]."</td>";
$ds1=mysqli_query($con,"select * from offer where pdtid=$cu[0]");
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
$dp=$cu[4]-($cu[4]*$ds[2]/100);
echo "<td>$ds[2]%</td>";
echo "<td>$dp/-</td>";
}
else
{
	$dp=$cu[4];
	echo "<td>----</td><td>----</td>";
}
}
else
{
	$dp=$cu[4];
	echo "<td>----</td><td>----</td>";
}
echo "<input type='hidden' id='f1' value='$dp'>";
$subtotal=$dp*$cu[1];
?>
<td><div id="subtotal"><?php echo $subtotal; ?></div></td>
<td><form action="dpaymode.php" method="get">
<input type="submit" value="PAYMENT" />
</form>
</td>
</tr>
<!--<tr><td colspan="2">total</td><td colspan="2"><div class="subtotal" id="2"></div></td></tr>-->
</table>
<?php include("footer.php"); 
}}
}
else
{
	if(isset($_SESSION['utype']))
	{
	if($_SESSION['utype']=="courier")
		 {header("location:courier.php");
		 }
		 else if($_SESSION['utype']=="admin")
		 {
			 header("location:admin.php");
		 }}
	else {
	header("location:login.php");}
}

?>