<html>
<head><title>categori</title></head>
<body>
<h1 align="center">INSERT CATEGORY</h1>
<h3 align="center"><a href="admin.php">HOME</a></h3>
<form action="New_Category_Sub.php" method="get" enctype="multipart/form-data">
<table align="center">
<tr><td>category name :-</td><td><input type="text" name="catname" /></td></tr>
<tr><td>category type :-</td><td><select name="cattype">
<option value="prim">primary</option>
<option value="sec">secondary</option>
</select>
</td></tr>
<tr><td>Prim:-</td><td><select name="prim">
<option value="0">NONE</option>
<?php
include("dbconnect.php");
$rs1=mysqli_query($con,"select count(*) from category");
$r=mysqli_fetch_array($rs1);
$totalRecords=$r[0];
$ele=mysqli_query($con,"select catname from category");
$catid=mysqli_query($con,"select catid from category");

for($i=0;$i<$totalRecords;$i++)
{$el=mysqli_fetch_array($ele);
$record=$el[0];
$cati=mysqli_fetch_array($catid);
$catrec=$cati[0];
	echo"<option value=".$catrec.">".$record."</option>";
$record++;
	}
?>
</select></td></tr>
<tr><td>upload image</td><td><input type="file" name="fileupload"></td></tr>
<tr><td><input type="submit" value="submit"></td><td><input type="reset" value="reset">
</td></tr>
</table>
</form>
</body>
</html>
