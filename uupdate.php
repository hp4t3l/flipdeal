<?php session_start();
if(!isset($_SESSION['user']))
{ if(!isset($_SESSION['uid']))
{ header("location:login.php");}}
else
{
$fn=$_REQUEST['fname'];
$ln=$_REQUEST['lname'];
$g=$_REQUEST['sex'];
$dob=$_REQUEST['dob'];
$uemail=$_REQUEST['uemail'];
$un=$_REQUEST['uname'];
$pass1=$_REQUEST['pass1'];
$add=$_REQUEST['address'];
$pin=$_REQUEST['pincode'];
$mob=$_REQUEST['mob'];
$img=$_FILES['img'];
$uid=$_SESSION['uid'];
include("dbconnect.php");
$t=time();
if(isset($_FILES['img']))
{
$pic=("u".$uid."_".$t.".jpg");
move_uploaded_file($img["tmp_name"],".\\userimg\\".$pic);
mysqli_query($con,"update user_regi set fname='$fn',lname='$ln', uname='$un',uemail='$uemail', address='$add', pincode='$pin', mob='$mob', uimg='$pic' where uid=$uid");
}
else
{
mysqli_query($con,"update user_regi set fname='$fn',lname='$ln', uname='$un',uemail='$uemail', address='$add', pincode='$pin', mob='$mob' where uid=$uid");
}
header("location:profile.php");
}
?>