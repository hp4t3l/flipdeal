<?php
$on=$_REQUEST['oname'];
$semail=$_REQUEST['semail'];
$pass=$_REQUEST['pass1'];
$pan=$_REQUEST['pan'];
$bankn=$_REQUEST['bankname'];
$bankac=$_REQUEST['banka/c'];
$add=$_REQUEST['address'];
$pin=$_REQUEST['pincode'];
$mob=$_REQUEST['mob'];
$legalname=$_REQUEST['legalname'];
$img=$_FILES['img'];
$pic=$img['name'];
move_uploaded_file($img["tmp_name"],".\\sellerimg\\".$img["name"]);
include("dbconnect.php");
mysqli_query($con,"insert into seller_regi (oname,semail,spass,pan,bankname,bankac,saddress,spincode,smob,legalname,simg) values('$on','$semail','$pass','$pan','$bankn','$bankac','$add','$pin','$mob','$legalname','$pic')");
echo "<h3 align='center'>now are succesfully become SELLLERRRRR";
echo "<a href='login.php'>LOGIN</a>";
?>