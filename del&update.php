<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<html>
<head></head>
<body>
<h1 align="center">EDIT & DELETE</h1>
<h3 align="center"><a href="admin.php">HOME</a></h3>
<!--<table align="center">
<tr><td>
<H4 align="center"><a href="">sort by</a></H4></td>
<td><select name="sort">
<option value="company">company</option>
<option value="category">category</option>
</select>
</td></tr></table>-->
<table align="center" border="4" width="100%">
<tr><th>product id</th><th>category name</th><th>product name</th><th>price</th><th>stock</th><th>company name</th><th>feature</th><th>image</th></tr>
<?php
include("dbconnect.php");
$count=mysqli_query($con,"select count(*) from product");
$r=mysqli_fetch_array($count);
$row=$r[0];
$rs=mysqli_query($con,"select * from product order by ptdid desc");
//$rs1=$rs2[0];
for($i=0;$i<$row;$i++)
{
	
$rs1=mysqli_fetch_array($rs);

	
	echo "<tr>";
	echo "<td>";
	echo $rs1[0];
	echo "</td>";
	echo "<td>";
	$cat=mysqli_query($con,"select catname from categori where catid='$rs1[1]'");
	$cat1=mysqli_fetch_array($cat);
	echo $cat1[0];
	echo "</td>";
	echo "<td>";
	echo $rs1[3];
	
	echo "</td>";
	echo "<td>";
	echo $rs1[4];
	echo "/-";
	echo "</td>";
	echo "<td>";
	echo $rs1[5];
	echo "</td>";
	echo "<td>";
	echo $rs1[6];
	echo "</td>";
	echo "<td>";
	echo $rs1[7];
	echo "</td>";
	$pic=$rs1[8];
	echo "<td>";
	echo "<img width='100' height='100' src='.\\productlogo\\$pic'>";
	echo "</td>";
	echo "<td>";
	echo "<form action='itemdelete.php' method='get'>";
	echo "<input type='hidden' value='$rs1[0]' name='t1'>";
	echo "<input type='submit' value='delete' >";
	echo "</form>";
	echo "</td>";
	echo "<td>";
	echo "<form action='update.php' method='get'>";
	echo "<input type='hidden' value='$rs1[0]' name='t1'>";
	echo "<input type='submit' value='update' >";
	echo "</form>";
	echo "</td>";
	echo "</tr>";
	}
}

?>
</table>
</body></html>
