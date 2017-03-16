<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>



<html>
<head>
<script>
function back()
{
	location.href="del&update.php";
	}
</script>
</head>
<body>
<h1 align="center">UPDATE</h1>
<?php 
$pid=$_REQUEST['t1'];
include("dbconnect.php");
$x=mysqli_query($con,"select * from product where ptdid='$pid'");
$y=mysqli_fetch_array($x);

?>
<form action="update_item.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="pdtid" value="<?php echo $y[0]; ?>" readonly>
<table border="2" align="center">

<tr><td>category :-</td><td>
<select name="catid">
<?php
$r=mysqli_query($con,"select count(*) from categori");
$cat=mysqli_query($con,"select catname from categori");
$id=mysqli_query($con,"select catid from categori");

$r1=mysqli_fetch_array($r);
$row=$r1[0];
for($i=0;$i<$row;$i++)
{$cat1=mysqli_fetch_array($cat);
$cat2=$cat1[0];
$id1=mysqli_fetch_array($id);
$id2=$id1[0];

if($id2==$y[1])
{ echo "<option selected value=".$id2.">".$cat2."</option>";
}
else
{
	echo "<option value=".$id2.">".$cat2."</option>";
}
$cat++;
$id++;
}
?></select>
</td></tr>
<tr><td>company :-</td><td>
<select name="compid">
<?php
$r=mysqli_query($con,"select count(*) from comapny");
$cat=mysqli_query($con,"select compname from comapny");
$id=mysqli_query($con,"select compid from comapny");

$r1=mysqli_fetch_array($r);
$row=$r1[0];
for($i=0;$i<$row;$i++)
{$cat1=mysqli_fetch_array($cat);
$cat2=$cat1[0];
$id1=mysqli_fetch_array($id);
$id2=$id1[0];
	
	if($id2==$y[2])
	{ echo "<option selected value=".$id2.">".$cat2."</option>";
}
else
{
	echo "<option value=".$id2.">".$cat2."</option>";
}
$cat++;
$id++;
}
?></select></td></tr>
<tr><td>product name:-</td><td><input type="text" name="pdtname" value="<?php echo $y[3]; ?>"></td></tr>
<tr><td>price :-</td><td><input type="text" name="price" value="<?php echo $y[4]; ?>" ></td></tr>
<tr><td>stock :-</td><td><input type="text" name="stock" value="<?php echo $y[5]; ?>"></td></tr>
<!--<tr><td>company :-</td><td><input type="text" name="company" value="<?php echo $y[6]; ?>" ></td></tr>-->
<tr><td>features :-</td><td><textarea name="features" rows="5" cols="30"><?php echo $y[7]; ?></textarea></td></tr>
<tr><td>image :- </td><td><?php
$pic=$y[8];
echo "<img width='100' height='100' src='.\\productlogo\\$pic'>";
?><br>
<input type="file" name="img" >
</td></tr>
<tr><td><input type="submit" value="submit"></td><td><input type="button" value="back" onClick="back();"></td></tr>
</form>
</table>
</body>
</html>
<?php
}
?>