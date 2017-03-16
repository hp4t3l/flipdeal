<html>
<head><title>category</title></head>
<body>
<h1 align="center">WELCOME ADMIN</h1>
<h3 align="center"><a href="admin.php">HOME</a></h3>
<div class="uli"><ul><li>
<form action="" method="get">
<select name="catid">
<?php
include("dbconnect.php");
$cc1=mysqli_query($con,"select * from categori");
while($cc=mysqli_fetch_array($cc1))
{
	
}
?>