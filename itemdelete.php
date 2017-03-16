<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<?php
$d=$_REQUEST['t1'];
include("dbconnect.php");
mysqli_query($con,"delete from product where ptdid='$d'");
header("del&update.php");
}
?>