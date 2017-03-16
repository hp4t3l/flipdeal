<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>

<link href="style.css" type="text/css" rel="stylesheet" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />    
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
function searchitem()
{
	var s=document.getElementById("sreach").value;
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{
		if(x.readyState==4 && x.status==200)
		{
			document.getElementById("searchitem").innerHTML=x.responseText;
		}
	};
	x.open("GET","searchitem.php?t="+s,true);
	x.send();
}
</script>
</head>

<body>
   <div id="main">
<!--<div id="sidelefthead">
<div id="siderighthead"></div>-->
<div id="head">
<div id="upperstrip">
<div id="headstrip">
<ul>
<li><a href="mainpage.php?t=0">online shopping</a></li>
<li><a href="sell.php">offers zone</a></li>
<li><a href="giftcard.php">Gift card</a></li>
<li><a href="#">24*7 customer care</a></li>
<li><a href="#">track order</a></li>
<?php

if(!isset($_SESSION['user']))
{
	echo "<li><a href='user_regi.php'>sign up</a></li>";
	echo "<li><a href='login.php'>login</a></li>";
}

?>
</ul>
</div>
<div id="headContainer">
<div class="hc" id="hc">
<!--<img src="maalgaadi.png" width="150px" height="30px" />-->
    <h3><i>&nbsp;Flip</i></h3><H4><i>deaL</i></H4>
<!--    <p>.com</p>-->
</div>
<div class="hc" id="hc"><div id="search">
<form action="searchitem.php" method="get">
<input type="search" name="search" maxlength="100" size="40" id="sreach" placeholder="Search for product,barnds eg. moto g2" onkeyup="searchitem();"/>&nbsp;&nbsp;<!--<input type="button" value="search" />--></div>
<div id="searchitem"></div> 

</form>	
</div>
<div class="hc" id="hc">
<div id="userinfo">
<?php 
if(isset($_SESSION['user']))
{ 
 if(($_SESSION['user']!="admin") )
 
{
	if(($_SESSION['user']!="courier_babu"))
	{
	if(isset($_SESSION['uid']))
{
include("dbconnect.php");
$ud=$_SESSION['uid'];
$user1=mysqli_query($con,"select * from user_regi where uid=$ud");
$user=mysqli_fetch_array($user1);


?>
  <ul id="MenuBar2" class="MenuBarHorizontal" >
    <li><a class="MenuBarItemSubmenu" href="#"><?php
	echo "<img src='.\\userimg\\$user[12]' width='50' height='50' id='pimg'/><br>";
	 ?></a>
      <ul>
        <li><a href="profile.php">ACCOUNT</a></li>
        <li><a href="ordershow.php">ORDER</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
    </li>
    <?php }}
	else
	{
	?>
    <ul id="MenuBar2" class="MenuBarHorizontal" >
    <li><a class="MenuBarItemSubmenu" href="courier.php"><?php
	echo "<img src='.\\userimg\\c1.png' width='50' height='50' id='pimg'/><br>";
	?></a>
      <ul>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
    </li>
  
    <?php
	}}
	else
	{
		?>
        <ul id="MenuBar2" class="MenuBarHorizontal" >
    <li><a class="MenuBarItemSubmenu" href="admin.php"><?php
	echo "<img src='.\\userimg\\admin1.jpg' width='50' height='50' id='pimg'/><br>";
	?></a>
      <ul>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
    </li>
  
        <?php
	}
	}?>
</div>
<div id="cart">
<a href="cart.php">CART(<?php include("dbconnect.php");
if(isset($_SESSION['user']))

{if(isset($_SESSION['uid']))
{$uid=$_SESSION['uid'];

$n=mysqli_query($con,"select count(*) from cart where userid='$uid'");
$n1=mysqli_fetch_array($n);
echo $n1[0];
}
else
{ echo '0';}
}
else
{ echo '0';}
?>)</a>
</div>
</div>
</div>
<div id="subcat">
<?php
include("dbconnect.php");
$y=mysqli_query($con,"select count(*) from categori where prim='0';");
$y1=mysqli_fetch_array($y);
$y2=$y1[0];
$q=mysqli_query($con,"select catname,catid from categori where prim='0';");

//echo "<ul id='MenuBar1' class='MenuBarHorizontal' aling='center'>";
echo "<ul id='subbar1' class='Menusubbar' aling='center'>";

for($i=0;$i<$y2;$i++)
{
$q1=mysqli_fetch_array($q);
echo "<a href='subcat2.php?t=$q1[1]'><li>$q1[0]</li></a>";
}
echo "</ul>";
?>
</div>
    </div>
<div id="body" >
<script type="text/javascript">
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
