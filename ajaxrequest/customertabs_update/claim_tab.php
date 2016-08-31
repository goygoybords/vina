<?php 

	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();

			$id = $_POST['id'];

				$qclaim= mysqli_query($db, " SELECT CC.*,
														CC.Policy_No as pNum,
														CC.Customer_ID as c_ID,
														C.CustomerID as cID,
														CC.Claim_Amount,
														CC.Claim_Date,
														CC.Driver_Fault,
														CC.Claim_ID,
														C.Last_Name as clnm,
														C.First_Name as cfnm,
														AV.Violation as aviolate,
														AV.VT_ID
														FROM customer_claim CC
														LEFT JOIN customers C on CC.Customer_ID=C.Customer_ID
														LEFT JOIN auto_violation AV on CC.Incident_ID=AV.VT_ID
														WHERE CC.Claim_ID='".$id."'
													");
				$getClaim = mysqli_fetch_assoc($qclaim);
				// carrier 
				echo json_encode($getClaim);
 ?>