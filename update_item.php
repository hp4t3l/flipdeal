<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<?php
$pdtid=$_REQUEST['pdtid'];
$catid=$_REQUEST['catid'];
$compid=$_REQUEST['compid'];
$pdtname=$_REQUEST['pdtname'];
$price=$_REQUEST['price'];
$stock=$_REQUEST['stock'];
$features=$_REQUEST['features'];
include("dbconnect.php");
$compname=mysqli_query($con,"select compname from comapny where compid='$compid'");
$compname1=mysqli_fetch_array($compname);
$compname2=$compname1[0];
mysqli_query($con,"update product set catid='$catid', companyid='$compid', pdtname='$pdtname', price='$price', stock='$stock', feature='$features', company='$compname2' where ptdid='$pdtid';");
$x=$_FILES['img']['size'];
if(	$x!=0)
{
$ptdimg=$_FILES['img'];	
echo $ptdimg["name"];
move_uploaded_file($ptdimg["tmp_name"],".\\productlogo\\".$ptdimg["name"]);
$nm=$ptdimg['name'];
echo $nm;
mysqli_query($con,"update product set pdtimage='$nm' where ptdid='$pdtid'");
}
//header ("location:update.php?t1=$pdtid");
header("location:del&update.php");
}
?>
