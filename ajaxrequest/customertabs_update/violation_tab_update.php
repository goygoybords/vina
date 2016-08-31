<?php
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();

	opendb();
	$violationid = $_POST['vioCID'];

	$qcusto = mysqli_query($db,"SELECT Customer_ID as CID
								FROM customers
								WHERE CustomerID='".$_POST['violationdriver']."'
								");
	$getC = fetch_all_array($qcusto)[0];

	$data['Customer_ID'] = $getC['CID'];
	$data['VT_ID'] = $_POST['violation'];
	$data['Violation_Date'] = strtotime($_POST['violationdate']);
	$data['Violation_Amount'] = $_POST['violationamount'];

	if($violationid > 0 || $violationid!=""){
		$b = query_update($db, "customer_auto_violation", $data, "id='".$_POST['violationid']."'");
		echo $b."update";
	}else{
		

		$numbs = substr(str_shuffle(str_repeat("0123456789", 8)), 0, 8); //$rescid['latest']+100001;
		$text = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 1)), 0, 1);

		$data['Violation_ID'] = $text.$numbs;
		
		$b = query_insert($db, "customer_auto_violation", $data);

		echo $b."insert";
	}
	closedb();

?>