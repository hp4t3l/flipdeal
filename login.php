
<head>
<title>login</title>
<script>
function check()
{
	if(document.f.txtuserid.value=="")
	{ alert("user id is empty");
		document.f.txtuserid.focus();
	}
	else if(document.f.txtpwd.value=="")
	{alert("password is empty");
	document.f.txtpwd.focus();}
	else if(document.f.txtpwd.lenght>=8)
	{alert("password should be of min 8 character");
	document.f.txtpwd.focus();}
	else 
	{	document.f.submit();
		}
}

</script>
</head>
<body>
<?php include("header1.php"); ?>
<form action="check_login.php" method="get" name="f">
<div id="login">
<ul>
<li><h1><b>Login</b></h1></li>
<li>user id &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtuserid" placeholder="enter user name"></li>
<li>password&nbsp;&nbsp;&nbsp;<input type="password" name="txtpwd" placeholder="enter password should have 8 charater"></li>
<li>user type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="utype">
<option value="general_user">GENERAL USER</option>
<!--<option value="seller">SELLER</option>-->
<option value="courier">COURIER</option>
<option value="admin">ADMIN</option>
</select></li>
<li><input type="button" value="login" onClick="check();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="reset"></li>
<li><a href="" >forgot password???</a></li>
<li>New in shopping cart&nbsp;&nbsp;&nbsp;&nbsp;<a href="user_regi.php">SING UP</a></li>
</ul>
</form>
</div>
<?php include("footer.php"); ?>		
