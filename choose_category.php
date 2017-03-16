<html>
<head><title>choose category</title></head>
<body>
<H1 align="center">CHOOSE CATEGORY</H1>
<h3 align="center"><a href="admin.html">HOME</a></h3>

<form action="insert_item.php" method="get">
<table align="center">
<tr><td>

<select name="cat">
<?php
include("dbconnect.php");
$rs1=mysqli_query($con,"select count(*) from categori");
$r=mysqli_fetch_array($rs1);
$totalRecords=$r[0];
$ele=mysqli_query($con,"select catname from categori where prim=0");
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
<tr><td><input type="submit" value="OK" /></td></tr>
</table>
</body>
</html>