<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<html>
<head>
<title>insert item</title>
</head>
<body>
<H1 align="center">INSERT ITEM</H1>
<h2 align="center"><a href="admin.php">HOME</a></h2>
<form action="iteminsert.php" method="post" enctype="multipart/form-data">
<table align="center">
<tr><td>Product Name :- </td><td><input type="text" name="pdtname" ></td></tr>
<tr><td>Price :- </td><td><input type="text" name="price" ></td></tr>
<tr><td>Stock :- </td><td><input type="text" name="stock" ></td></tr>
<tr><td>category :- </td><td><select name="cattype">
<option value="0">NONE</option>
<?php
include("dbconnect.php");
$rs1=mysqli_query($con,"select count(*) from categori");
$r=mysqli_fetch_array($rs1);
$totalRecords=$r[0];
$ele=mysqli_query($con,"select catname from categori");
$catid=mysqli_query($con,"select catid from categori");

for($i=0;$i<$totalRecords;$i++)
{$el=mysqli_fetch_array($ele);
$record=$el[0];
$cati=mysqli_fetch_array($catid);
$catrec=$cati[0];
	echo"<option value=".$catrec.">".$record."</option>";
$record++;
	}
?>
</select>
</td></tr>
<tr><td>Compnay Name :- </td><td>
<select name="comtype">
<option value="0">NONE</option>
<?php
include("dbconnect.php");
$rs1=mysqli_query($con,"select count(*) from comapny");
$r=mysqli_fetch_array($rs1);
$totalRecords=$r[0];
$ele=mysqli_query($con,"select compname from comapny");
$compid=mysqli_query($con,"select compid from comapny");

for($i=0;$i<$totalRecords;$i++)
{$el=mysqli_fetch_array($ele);
$record=$el[0];
$compi=mysqli_fetch_array($compid);
$comprec=$compi[0];
	echo"<option value=".$comprec.">".$record."</option>";
$record++;
	}
?>
</select>
</td></tr>
<tr><td>Features :- </td><td><textarea name="features"></textarea></td></tr>
<tr><td>Attach image of Product :- </td><td><input type="file" name="imgfile" ></td></tr>
<tr><td><input type="submit" value="submit"></td><td><a href="admin.php"><input type="button" value="cancel" ></a></td></tr>
</table>
</form>
</body>
</html>
<?php
}
?>