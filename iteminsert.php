<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<?php

$n=$_REQUEST['pdtname'];
$price=$_REQUEST['price'];
$stock=$_REQUEST['stock'];
$catid=$_REQUEST['cattype'];
$compid=$_REQUEST['comtype'];
$features=$_REQUEST['features'];
$ptdimg=$_FILES['imgfile'];
$t=time();
$nm=("cat_".$t.".jpg");
move_uploaded_file($ptdimg["tmp_name"],".\\productlogo\\".$nm);
include("dbconnect.php");
$compname=mysqli_query($con,"select compname from comapny where compid='$compid'");
$compname1=mysqli_fetch_array($compname);
$compname2=$compname1[0];
mysqli_query($con,"insert into product(catid,companyid,pdtname,price,stock,company,feature,pdtimage,al_date) values('$catid','$compid','$n','$price','$stock','$compname2','$features','$nm',$t)");
header("location:del&update.php");
echo "<a href='admin.html'><h1 ailng=center>HOME</h11></a>";
}
?>