<?php 
include("header1.php");
if(isset($_SESSION['user']))
{ 
if($_SESSION['utype']=="admin")
{ if($_SESSION['user']=="admin")
{ 
?>
<title>ADMIN</title>
</head>
<body><div class="uli">
<h1 align="center">WELCOME ADMIN</h1>
<h3 align="center"><a href="admin.php">HOME</a></h3>
<table align="center">
<tr><td>
<ul>
<li><a href="mainpage.php?t=0">main page</a></li>
<li><a href="categori.php">create new category</a></li>
<li><a href="company_insert.php">Create New COMPANY</a></li>
<li><a href="insert_item.php">insert item</a></li>
<li><a href="del&update.php">delete & update item</a></li>
<li><a href="sell_report.php">sell report</a></li>
<li><a href="stock_report.php">stock report</a></li>
<li><a href="offer.php">offer zone</a></li>
<li><a href="return_report.php">refund request repoert</a></li>
</ul>
</td></tr></table></div>
</body>
</html>


<?php 
}
else
{ header("location:mainpage.php?t=0");
}

}
else
{ header("location:mainpage.php?t=0");
}
}
else
{ header("location:mainpage.php?t=0");
}
include("footer.php");
?>