
<head><title>registraion</title></head>
<script>
function check(){
if(document.f.uname.value=="")
{
	alert("cannot be empty");
	document.f.uname.focus();
	}else if(document.f.fname.value=="")
{
	alert("cannot be empty");
	document.f.fname.focus();
	}else if(document.f.uemail.value=="")
{
	alert("cannot be empty");
	document.f.uemail.focus();
	}
else if(document.f.pass1.value=="")
{
	alert("cannot be empty");
	document.f.pass1.focus();
	}else if(document.f.pass1.value=="")
{
	alert("cannot be empty");
	document.f.pass1.focus();
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
<div class="guli"><ul>
<li><h1 align="center"><b>REGISTRATION FOR GENERAL USER</b></h1></li>
    <li>
<form action="uregi.php" method="post" enctype="multipart/form-data" name="f">
<table align="center" class='userform' padding='2'>
<tr><td>FIRST NAME</td><td><input type="text" name="fname" placeholder="enter first name" /></td></tr>
<tr><td>LAST NAME</td><td><input type="text" name="lname" placeholder="enter last name" /></td></tr>
<tr><td>GENDER</td><td><input type="radio" name="sex" value="M" />MALE<input type="radio" name="sex" value="F" />FEMALE</td></tr>
<tr><td>DATE OF BIRTH</td><td><input type="date" name="dob" /></td></tr>
<tr><td>USER NAME</td><td><input type="text" name="uname" placeholder="eg: johan1223"/></td></tr>
<tr><td>EMAIL ID</td><td><input type="email" name="uemail" placeholder="eg: ex@exmail.com" /></td></tr>
<tr><td>PASSWORD</td><td><input type="password" name="pass1" placeholder="atleast 8 character" /></td></tr>
<tr><td>CONFIRM PASSWORD</td><td><input type="password" name="pass2" placeholder="atleastt 8 character" /></td></tr>
<tr><td>ADDRESS</td><td><textarea name="address" rows="5" cols="22"></textarea></td></tr>
<tr><td>PINCODE</td><td><input name="pincode" maxlength="5" type="text" placeholder="max 5 digits"/></td></tr>
<tr><td>MOBILE NO.</td><td><input type="text" name="mob" maxlength="10" placeholder="max 10 digits" /></td></tr>
<tr><td>UPLOAD IMAGE</td><td><input type="file" name="img" /></td></tr>
<tr><td><input type="button" value="SUBMIT" onClick="check();" /></td><td><input type="reset" value="RESET" /></td></tr>
</table>
</form></li></ul>
<?php include("footer.php"); ?>	
