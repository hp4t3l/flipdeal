<head>
<script>
function check(){
	alert("hi1");
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
			alert("hi");
}

</script>
</head>
<body>

<?php
include("header1.php"); include("dbconnect.php");
if(isset($_SESSION['user']))
{ if(isset($_SESSION['uid']))
{
$u=$_SESSION['uid'];
$user1=mysqli_query($con,"select * from `user_regi` where `uid`=$u") or die("user");
$user=mysqli_fetch_array($user1);
 echo "<div class='uli'><ul><li><form action='uupdate.php' method='post' enctype='multipart/form-data' name='f'>
<img width='100' height='100' src='.\\userimg\\$user[12]'></li><li><br>UPLOAD IMAGE&nbsp;&nbsp;&nbsp;&nbsp;<input type='file' name='img' /></li>
<li>USER NAME&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='uname' value='$user[5]'/></li>
<li>FIRST NAME&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='fname' value='$user[1]' /></li>
<li>LAST NAME&nbsp;&nbsp;&nbsp;<input type='text' name='lname' value='$user[2]' /></li>
<li>GENDER&nbsp;&nbsp;&nbsp;&nbsp;";
if($user[3]=='M')
{ echo "MALE";}
else
{ echo "FEMALE";}
echo "</li><li>
DATE OF BIRTH&nbsp;&nbsp;&nbsp;&nbsp;$user[4]</li>
<li>EMAIL ID&nbsp;&nbsp;&nbsp;&nbsp;<input type='email' name='uemail' value='$user[6]' /></li>
<li>ADDRESS&nbsp;&nbsp;&nbsp;&nbsp;<textarea name='address' rows='5' cols='22' >$user[8]</textarea></li>
<li>PINCODE&nbsp;&nbsp;&nbsp;&nbsp;<input name='pincode' maxlength='5' type='text' value='$user[10]'/></li>
<li>MOBILE NO.&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='mob' maxlength='10' value='$user[11]' /></li>
<li><input type='submit' value='SUBMIT' /></li>
</ul>
</form></div>";


}}
include("footer.php");
?>