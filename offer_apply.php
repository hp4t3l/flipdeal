<?php
include("dbconnect.php");
$f=$_REQUEST['f'];
$pid=$_REQUEST['t'];
$d=$_REQUEST['d'];
$t=time();
$v=$_REQUEST['v'];
if(isset($_REQUEST['f']))
{
	if($f==1)
	{
		mysqli_query($con,"insert into offer(pdtid,discount,validity,all_date) values($pid,$d,$v,$t)") or die("insert");
		echo "inserted";
	}
	else if($f==2)
	{
		mysqli_query($con,"update offer set discount=$d , validity=$v , all_date=$t where pdtid=$pid") or die("update");
		echo "updated";
	}
	else if($f==3)
	{
		mysqli_query($con,"delete from offer where pdtid=$pid") or die("del");
		header("location:offer.php");
	}
}
?>