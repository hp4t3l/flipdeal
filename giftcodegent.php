<?php include("header1.php");
if(isset($_SESSION['user']))
{
	if(isset($_SESSION['uid']))
	{
		$a=$_REQUEST['a'];
		$t=time();
		$gift=("FG00".$uid);
		include("dbconnect.php");
		mysqli_query($con,"insert into giftcode(gift_code,amount,date,status) values('$gift',$a,$t,'ACT')") or die("not");
		$g1=mysqli_query($con,"select * from giftcode where date=$t") or die("select");
		$g=mysqli_fetch_array($g1);
		echo "<table align='center' border='1'><tr><th colspan='2'>GIFT CARD</th></tr>";
		echo "<tr><td>GIFT CODE</td><td>".$g[1]."</td></tr>";
		echo "<tr><td>AMOUNT</td><td>".$g[4]."</td></tr>";
		echo "<tr><td>GIFT PASS</td><td>".$g[6]."</td></tr>";
		echo "<tr><td>STATUS</td><td>".$g[7]."</td></tr>";
		?>
		<tr><td align="center" colspan="2">
		<a href="mainpage.php?t=0"><input type="button" value="CONTINUE TO SHOP" /></a></td></tr></table>
	
<?php }}
include("footer.php"); ?>