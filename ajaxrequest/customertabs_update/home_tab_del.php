<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		if(count($_POST)){
		    $caid = $_POST['caid'];
		    $chid = $_POST['chi'];
		    $chpid = $_POST['chp'];

		     $dCA = mysqli_query($db,"DELETE FROM `customer_address` WHERE AddressID='".$caid."'");
		     $dCHI = mysqli_query($db,"DELETE FROM `customer_home_info` WHERE HAID='".$chid."'");
		     $dCHP = mysqli_query($db,"DELETE FROM `customer_home_policy` WHERE HPID='".$chpid."'");

			echo "deleted-CA-".$dCA."CHI-".$dCHI."CHP-".$dCHP;

		}
	closedb();
 ?>