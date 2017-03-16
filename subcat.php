<html>
<head>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />    
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</head>
<body>
<?php
$a=$_REQUEST['t1'];
include("dbconnect.php");
$y=mysqli_query($con,"select count(*) from categori where prim='$a';");
$y1=mysqli_fetch_array($y);
$y2=$y1[0];
$q=mysqli_query($con,"select catname,catid from categori where prim='$a';");

echo "<ul id='MenuBar1' class='MenuBarHorizontal'>";
for($i=0;$i<$y2;$i++)
{
$q1=mysqli_fetch_array($q);
echo "<li><a href='subcat2.php?t=$q1[1]'>$q1[0]</a></li>";
}
echo "</ul>";
?>
</body>
</html>
