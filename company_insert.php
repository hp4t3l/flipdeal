<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<html>
<head>
<title>company insert</title>
</head>
<body>
<H1 align="center">INSERT COMPANY</H1>
<h3 align="center"><a href="admin.php">HOME</a></h3>

<form action="companydb.php" method="post" enctype="multipart/form-data">
<table align="center">
<tr><td>company name : </td><td><input type="text" name="compname"  /></td></tr>
<tr><td>display name : </td><td><input type="text" name="displayname"></td></tr>
<tr><td>company details : </td><td><textarea name="compdetails"></textarea></td></tr>
<tr><td>category type : </td>
<td><select name="cat">
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
</select></td></tr>
<tr><td>attach logo :- </td><td><input type="file" name="complogo" /><td><tr>
<tr><td><input type="submit" value="submit" /></td></tr>
</table>
</form>
</body>
</html>
<?php
}
?>