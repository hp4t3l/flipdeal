<?php session_start();

if($_SESSION['utype']!='admin')
{header("location:login.php");}
else
{
?>
<html>
<head><title>offer</title>
<script>
function ap(n)
{
	document.getElementById("d"+n.id).innerHTML="<input type='text' size='5' name='dis' id='dis"+n.id+"'>";
	document.getElementById("v"+n.id).innerHTML="<input type='text' size='5' name='vil' id='vil"+n.id+"'>";
	document.getElementById("a"+n.id).innerHTML="<input type='button' value='OK' onclick='ofap(this);' id='"+n.id+"'>";
}
function ap1(n)
{
	var di = document.getElementById("di"+n.id).value;
	var vi = document.getElementById("vi"+n.id).value;
	document.getElementById("d"+n.id).innerHTML="<input type='text' size='5' name='dis' value="+di+" id='dis"+n.id+"'>";
	document.getElementById("v"+n.id).innerHTML="<input type='text' size='5' name='vil' value="+vi+" id='vil"+n.id+"'>";
	document.getElementById("a"+n.id).innerHTML="<input type='button' value='OK' onclick='up(this);' id='"+n.id+"'>";
}
function rp(r)
{
	var di = document.getElementById("di"+r.id).value;
	var vi = document.getElementById("vi"+r.id).value;
	var pdt=document.getElementById("i"+r.id).value;
	location.href="offer_apply.php?t="+pdt+"&d="+di+"&v="+vi+"&f=3";
}
function up(d)
{
	var di = document.getElementById("dis"+d.id).value;
	var vi = document.getElementById("vil"+d.id).value;
	var pdt=document.getElementById("i"+d.id).value;
	if(di!="")
	{	
		if(di<100)
		{
		if(vi!="")
		{
	document.getElementById("a"+d.id).innerHTML="<input type='button' value='update' onclick='ap1(this);' id='"+d.id+"'>";
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{
		
		if(x.readyState==4 && x.status==200)
		{	
			document.getElementById("d"+d.id).innerHTML=x.responseText;
		}
	};
	x.open("GET","offer_apply.php?t="+pdt+"&d="+di+"&v="+vi+"&f=2",true);
	x.send();
	location.reload();
		}else
		{
			alert("empty");
		document.getElementById("vil"+d.id).focus();

		}
		}
		else
		{ 
		alert("discoint not more than 100%");
		document.getElementById("dis"+d.id).focus();
		}
	}
	else
	{
		alert("empty");
		document.getElementById("dis"+d.id).focus();
	}
}
function ofap(u)
{
	var dis=document.getElementById("dis"+u.id).value;
	var vil=document.getElementById("vil"+u.id).value;
	var pdt=document.getElementById("i"+u.id).value;
	if(dis!="")
	{
		if(dis<100)
		{
		if(vil!="")
		{
	document.getElementById("a"+u.id).innerHTML="<input type='button' value='update' onclick='up(this);' id='"+u.id+"'>";
	var x=new XMLHttpRequest();
	x.onreadystatechange=function()
	{
		
		if(x.readyState==4 && x.status==200)
		{	
			alert(x.readyState);
			document.getElementById("d"+u.id).innerHTML=x.responseText;
		}
	};
	x.open("GET","offer_apply.php?t="+pdt+"&d="+dis+"&v="+vil+"&f="+1,true);
	x.send();
	location.reload();
		}else
		{
			alert("empty");
		document.getElementById("vil"+u.id).focus();

		}
		}
		else
		{
			alert("v");
		document.getElementById("dis"+u.id).focus();
		}
	}
	else
	{
		alert("empty");
		document.getElementById("dis"+u.id).focus();
	}
}

</script>
</head>
<body>
<h1 align="center">OFFER</h1>
<h3 align="center"><a href="admin.php">HOME</a></h3>
<table align="center" border="1">
<form name="f">
<?php
include("dbconnect.php");
$ety1=mysqli_query($con,"select * from offer left join product on offer.pdtid=product.ptdid");
$i=0;
while($ety=mysqli_fetch_array($ety1))
{
	if($i==0)
	{
		echo "<tr bgcolor='red'><th colspan='8'><h2>Applied Offer<br>on product</h2></th></tr>";
		echo "<tr><th>s.no.</th><th>product image</th><th>product name</th><th>applid date</th><th>discount</th><th>validity(days)</th><th>apply</th><th>Remove</th></tr>";
	}
	echo "<tr><td>".($i+1)."</td><td><img src='.\\productlogo\\$ety[13]' width='50' height='50'></td><td>$ety[8]</td><td>".date("Y-m-d",$ety[4])."</td>";
	echo "<td><div id='d$i'><input type='hidden' value='$ety[2]' name='id' id='di$i'>$ety[2]</div></td><td><div id='v$i'><input type='hidden' value='$ety[3]' name='id' id='vi$i'>$ety[3]</div></td><div><td><input type='hidden' value='$ety[5]' name='id' id='i$i'><div id='a$i'><input type='button' value='Update' onclick='ap1(this);' id='$i'><div></td><td><input type='button' value='Remove' onclick='rp(this);' id='$i'></td></tr>";
	$i++;
}
?>
</table>
<table align="center" border="1">

<?php
 $st1=mysqli_query($con,"select * from product");
 $ety1=mysqli_query($con,"select * from offer left join product on offer.pdtid=product.ptdid where validity<>0");
$j=0;
while($st=mysqli_fetch_array($st1))
{	$ofap1=mysqli_query($con,"select count(*) from offer where pdtid=$st[0]");	
$ofap=mysqli_fetch_array($ofap1);
if($ofap[0]==0)
{
	if($j==0)
	{
		echo "<tr bgcolor='#0066FF'><th colspan='6'><h2>Apply Offer on <br> product</h2></th></tr>";
		echo "<tr><th>s.no.</th><th>product image</th><th>product name</th><th>discount</th><th>validity(days)<th>apply</th></tr>";
	}
	echo "<tr><td>".($j+1)."</td><td><img src='.\\productlogo\\$st[8]' width='50' height='50'></td><td>$st[3]</td>";
	echo "<td><div id='d$i'><div></td><td><div id='v$i'></div></td><td><input type='hidden' value='$st[0]' name='id' id='i$i'><div id='a$i'><input type='button' value='apply' onclick='ap(this);' id='$i'></div></td></tr>";
	$j++;
	$i++;
}
}}
?>
</form>
</table>
</body>
</html>