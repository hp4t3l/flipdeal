<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<?php
$n=$_REQUEST['compname'];
$de=$_REQUEST['compdetails'];
$catid=$_REQUEST['cat'];
$clogo=$_FILES['complogo'];
$discomp=$_REQUEST['displayname'];
$t=time();
$pin=("comp_".$t);
move_uploaded_file($clogo["tmp_name"],".\\companylogo\\".$pin);
$fn=$clogo['name'];
echo $fn;

include("dbconnect.php");
mysqli_query($con,"insert into comapny(compname,compdetails,catid,complogo,displayname) values('$n','$de','$catid','$pin','$discomp');");
header("location:admin.php");
}
?>