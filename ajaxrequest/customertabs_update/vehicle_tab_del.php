<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		if(count($_POST)){
		    $vID= $_POST['vID'];
		    $vehicID = $_POST['vehicelID'];
		    $dC = mysqli_query($db,"DELETE FROM `customer_auto_policy` WHERE VPID='".$vID."'");
		    $dCA = mysqli_query($db,"DELETE FROM `customer_auto_info` WHERE VehicleID='".$vehicID."'");

			echo "deleted-C-".$dC."CA-".$dCA;
					
		}
	closedb();
 ?>