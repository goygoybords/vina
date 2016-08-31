<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		if(count($_POST)){
		    $qid= $_POST['qid'];

		    $dCC = mysqli_query($db,"DELETE FROM customer_quote WHERE QID='".$qid."'");
			echo $dCC;
					
		}
	closedb();
 ?>