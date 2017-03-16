<?php
include("header1.php");
if(isset($_SESSION['user']))
{ if(isset($_SESSION['uid']))
{
?>
<form action="giftcheck.php" method="get"><div class="guli"><ul>
<table align="center">
<li><tr><th>GIFT CODE</th><td><input type="text" name="gc" placeholder="enter gift code here"/></td></tr>
<tr><th>GFIT PASS</th><td><input type="text" name="gp" placeholder="enter gift pass" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit"  /></td></tr></li>
</table></ul></div></form>
<?php
}}
include("footer.php");
?>
