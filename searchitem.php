<?php
include("dbconnect.php");
$s=$_REQUEST['t'];
$csr1=mysqli_query($con,"select count(pdtname) from product where pdtname like '%".$s."%'");
$csr=mysqli_fetch_array($csr1);
$ccomp1=mysqli_query($con,"select count(displayname) from comapny where displayname like '%".$s."%'");
$ccomp=mysqli_fetch_array($ccomp1);
$cf1=mysqli_query($con,"select count(feature) from product where feature like '%".$s."%'");
$cf=mysqli_fetch_array($cf1);
echo "<ul>";
if($s!=NULL)
{
if($csr[0]!=0)
{
$sr1=mysqli_query($con,"select ptdid,pdtname,pdtimage from product where pdtname like '%".$s."%'");
while($sr=mysqli_fetch_array($sr1))
{
	echo "<li><a href='mainpage2.php?t=$sr[0]'>";
	echo "<img src='.\\productlogo\\$sr[2]' width='20' height='20'>&nbsp;&nbsp;";
	echo $sr[1];
	echo "<br></a></li>";
	
}
}
if($ccomp[0]!=0)
{
$srcomp1=mysqli_query($con,"select compid,displayname,complogo,compname from comapny where displayname like '%".$s."%'");
while($srcomp=mysqli_fetch_array($srcomp1))
{
	echo "<li><a href='mainpage3.php?t=$srcomp[0]'>";
	echo "<img src='.\\companylogo\\$srcomp[2]' width='20' height='20'>&nbsp;&nbsp;";
	echo $srcomp[1]."($srcomp[3])";
	echo "<br></a></li>";
	
}
}
if($cf[0]!=0)
{
$srf1=mysqli_query($con,"select ptdid,feature,pdtname,pdtimage from product where feature like '%".$s."%'");
while($srf=mysqli_fetch_array($srf1))
{
	echo "<li><a href='mainpage2.php?t=$srf[0]'>";
	echo "<img src='.\\productlogo\\$srf[3]' width='20' height='20'>&nbsp;&nbsp;";
	echo $srf[1]."($srf[2])";
	echo "<br></a></li>";
	
}
}

echo "</ul>";
}
?>