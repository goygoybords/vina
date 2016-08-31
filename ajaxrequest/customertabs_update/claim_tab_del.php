<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		if(count($_POST)){
		    $cl_ID= $_POST['cl_id'];

		    $dCC = mysqli_query($db,"DELETE FROM `customer_claim` WHERE Claim_ID='".$cl_ID."'");
			echo $dCC;
					
		}
	closedb();
 ?>