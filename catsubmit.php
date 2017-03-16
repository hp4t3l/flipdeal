<?php session_start();
if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>

<?php 
$a=$_REQUEST['catname'];
$b=$_REQUEST['cattype'];
$c=$_REQUEST['prim'];
$f=$_FILES['fileupload'];

move_uploaded_file($f["tmp_name"],".\\categorylogo\\".$f["name"]);
$nm=$f['name'];
include("dbconnect.php");
mysqli_query($con,"insert into categori( catname,cattype,prim,catimage) values('$a','$b','$c','$nm')") ;
echo "saved data";
header("location:admin.php");
}
?> 
