<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		if(count($_POST)){
		    $uid = $_POST['d'];
		    $dU = mysqli_query($db,"DELETE FROM `user` WHERE IBO_UserID='".$uid."'");
		    $dUD = mysqli_query($db,"DELETE FROM `user_detail` WHERE IBO_UserID='".$uid."'");

			echo "deleted";

		}
	closedb();
 ?>