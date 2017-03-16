<?php
include("header1.php");
if($_SESSION['utype']!="general_user")
{ header("loaction:login.php");
}
else
{
$am=$_REQUEST['am'];
$t=time();
include("dbconnect.php");
$giftcode="FG0".$uid;
echo "<hr>";
echo $t." ".$giftcode." ".$am;
echo "<hr>";
//mysqli_query($con,"insert into giftcode(gift_code,amount,date,status) values('$giftcode','$am','$t','ACT');") or die("not");
mysqli_query($con,"INSERT INTO `giftcode`(`gift_code`, `amount`, `date`, `status`) VALUES ('$giftcode',$am,'$t','ACT')") or die("xxx");
$g1=mysqli_query($con,"select * from giftcode where date='$t'") or die("select");
$g=mysqli_fetch_array($g1);
echo "<br>".$g[0];
echo "<table align='center' border='1'><tr><th colspan='2'>GIFT CARD</th></tr>";
echo "<tr><td>GIFT CODE</td><td>".$g[1]."</td></tr>";
echo "<tr><td>AMOUNT</td><td>".$g[4]."</td></tr>";
echo "<tr><td>GIFT PASS</td><td>".$g[6]."</td></tr>";
echo "<tr><td>STATUS</td><td>".$g[7]."</td></tr>";
?>
<tr><td align="center" colspan="2">
<a href="mainpage.php?t=0"><input type="button" value="CONTINUE TO SHOP" /></a></td></tr></table>
<?php
}
include("footer.php"); ?>