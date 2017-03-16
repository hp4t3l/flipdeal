<?php session_start();
$utype=$_REQUEST['utype'];
$user=$_REQUEST['txtuserid'];
$pwd=$_REQUEST['txtpwd'];
if($utype=='admin')
{
	if($user=='root')
	{
		echo $utype;
		if($pwd=='root')
		{
			$a="admin";
			$_SESSION['utype']=$a;
			$_SESSION['user']="admin";
			header("location:admin.php");
		}
	}
}
else if($utype=='general_user')
{
	include("dbconnect.php");
	$z=mysqli_query($con,"select upass,uid from user_regi where uname='$user'");
	$z1=mysqli_fetch_array($z);
	$c=mysqli_query($con,"select count(*) from user_regi where uname='$user'");
	$c1=mysqli_fetch_array($c);
	if($c1[0]>0)
	{
		if($z1[0]==$pwd)
		{
			$_SESSION['utype']="general_user";
			$_SESSION['user']=$user;
			$_SESSION['uid']=$z1[1];
			header("location:mainpage.php?t=0");
		}
		else
		{
			header("location:login.php");
		}
	}
	else
	{
		header("location:login.php");
	}
}
else if($utype=="courier")
{
	if($user=="babu")
	{	
		if($pwd="babu")
		{
			$_SESSION['utype']="courier";
			$_SESSION['user']=("courier_".$user);
			header("location:courier.php");
		}
		else
		{
			header("location:login.php");
		}

	}
	else
	{
 		header("location:login.php");
	}

}
else
{	
	header("location:login.php");
}

	
?>