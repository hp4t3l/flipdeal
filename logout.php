<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['utype']);
unset($_SESSION['uid']);
			
header("location:mainpage.php?t=0");
?>