<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		if(count($_POST)){
		    $cus_ID= $_POST['c_id'];
		    $cusID= $_POST['cid'];

		    $dC = mysqli_query($db,"DELETE FROM `customers` WHERE CustomerID='".$cusID."'");
		    $dCA = mysqli_query($db,"DELETE FROM `customer_address` WHERE Customer_ID='".$cus_ID."'");
		    $dCB = mysqli_query($db,"DELETE FROM `customer_business` WHERE CustomerID='".$cusID."'");
		    $dCP = mysqli_query($db,"DELETE FROM `customer_phone` WHERE CustomerID='".$cusID."'");
		    $dCN = mysqli_query($db,"DELETE FROM `customer_network` WHERE CustomerID='".$cusID."'");

			echo "deleted-C-".$dC."CA-".$dCA."CB-".$dCB."CP-".$dCP."CN-".$dCN;
					
		}
	closedb();
 ?>