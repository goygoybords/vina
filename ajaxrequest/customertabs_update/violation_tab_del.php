<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		if(count($_POST)){
		    $cavid = $_POST['cavid'];
		    $dCAV = mysqli_query($db,"DELETE FROM `customer_auto_violation` WHERE id='".$cavid."'");
			echo $dCAV;

		}
	closedb();
 ?>