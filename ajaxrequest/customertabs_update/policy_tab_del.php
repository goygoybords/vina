<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		if(count($_POST)){
		    $pid= $_POST['pid'];

		    $dP = mysqli_query($db,"DELETE FROM `customer_policy` WHERE PID='".$pid."'");
			echo $dP;
					
		}
	closedb();
 ?>