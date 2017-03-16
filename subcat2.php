<?php
include('header1.php');
if(isset($_SESSION['utype']))
{
if($_SESSION['utype']=="courier")
{
	header("location:courier.php");
}}

include('dbconnect.php');
$a=$_REQUEST['t'];
$x=mysqli_query($con,"select count(*) from categori where prim='$a'");
$x1=mysqli_fetch_array($x);
if($x1[0]=='0')
{header("location:mainpage.php?t=$a");
}
else
{
	?>
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
<?php
	$cat=mysqli_query($con,"select catname,catid from categori where prim='$a'");
echo "<div id='subcat2'>";
echo "<ul id='subbar2' aling='canter'>";
for($i=0;$i<$x1[0];$i++)
{ 
 $cat1=mysqli_fetch_array($cat);
echo "<a href='subcat2.php?t=$cat1[1]'><li>$cat1[0]</li></a>";

}
echo "</ul>";
echo "</div>";

}
include('footer.php');
?>
