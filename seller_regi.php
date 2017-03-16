		
<head><title>registraion</title></head>
<script>
function check()
{
if(document.f.oname.value=="")
{
	alert("cannot be empty");
	document.f.oname.focus();
	}
else if(document.f.pass1.value=="")
{
	alert("cannot be empty");
	document.f.pass1.focus();
	}else if(document.f.pass2.value=="")
{
	alert("cannot be empty");
	document.f.pass2.focus();
	}else if(document.f.pass1.value!=document.f.pass2.value)
	{
		alert("password miss match");
		document.f.pass2.focus();
	}
	else
	{
		document.f.submit();
	}



}
</script>
<body>
<?php include("header1.php"); ?>
<!--<h1 align="center"><b>REGISTRATION</b></h1>-->	
<div class="uli"><ul><li>
<h1 align="center"><b>REGISTRATION FOR SELLER USER</b></h1></li><li>
<form action="sregi.php" method="post" enctype="multipart/form-data" name="f">
<table align="center">
<tr><td>OWNER NAME</td><td><input type="text" name="oname" placeholder="enter full name" /></td></tr>
<tr><td>EMAIL ID</td><td><input type="email" name="semail" placeholder="eg: ex@exmail.com" /></td></tr>
<tr><td>PASSWORD</td><td><input type="password" name="pass1" placeholder="atleast 8 character" /></td></tr>
<tr><td>CONFIRM PASSWORD</td><td><input type="password" name="pass2" placeholder="atleastt 8 character" /></td></tr>
<tr><td>PANCARD NO.</td><td><input type="text" name="pan" placeholder="enter pan card no." /></td></tr>
<tr><td>BANK NAME </td><td><input type="text" name="bankname" placeholder="enter bank name" /></td></tr>
<tr><td>BANK A/C NO.</td><td><input type="text" name="banka/c" placeholder="enter bank a/c" /></td></tr>
<tr><td>ADDRESS</td><td><textarea name="address" rows="5" cols="22"></textarea></td></tr>
<tr><td>PINCODE</td><td><input name="pincode" maxlength="5" type="text" placeholder="max 5 digits"/></td></tr>
<tr><td>MOBILE NO.</td><td><input type="text" name="mob" maxlength="10" placeholder="max 10 digits" /></td></tr>
<tr><td>LEGAL NAME</td><td><input type="text" name="legalname" placeholder="enter bussiness legal name"/></td></tr>
<tr><td>UPLOAD IMAGE</td><td><input type="file" name="img" /></td></tr>
<tr><td><input type="button" value="START SELLING" onClick="check();" /></td><td><input type="reset" value="RESET" /></td></tr>
</table>
</form></li></ul>
<?php include("footer.php"); ?>
