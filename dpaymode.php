<head>
<script language="javascript">
function call()
{
	if(document.f.mode.value=="cod")
	{ location.href="dcod.php";}
	else if(document.f.mode.value=="giftcard")
	{ location.href="dgiftgetway.php";}
	else
	{ alert("choose mode of payment");}	}
function back()
{ location.href="buy.php";}
</script>
</head>
<?php
include("header1.php");
if(isset($_SESSION['user']))
{ if(isset($_SESSION['uid']))
{?>
<table align="center" cellspacing="10px">
<form name="f"><div class="guli"><ul><li>
<tr><th><h1>CHOOSE MODE OF PAYMENT</h1></th></tr>
<tr><td align="center"><input type="radio" name="mode" value="cod" />COD(udhari)</td></tr>
<tr><td align="center"><input type="radio" name="mode" value="giftcard"/>GIFT CARD</td></tr>
<tr><td align="center"><input type="button" onclick="call();" value="ok" /></td></tr>
<tr><td align="center"><input type="button" onclick="back();" value="back" /></td></tr>
</form></li></ul></div>
</table>
<?php	}}
include("footer.php");
?>

