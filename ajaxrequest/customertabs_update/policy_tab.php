<?php 

	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();

			$id = $_POST['id'];

				$qpolicy = mysqli_query($db, " SELECT customer_policy.PolicyNo,
												customer_policy.Policy_Code,
												policy.Policy_Type,
												customer_policy.StatusID,
												customer_policy.Premium,
												customer_policy.RenewPremium,
												customer_policy.Bind_Date as dbind,
												customer_policy.Expire_Date as dex,
												customer_policy.PID as cPid,
												customer_policy.CustomerID as cpid,
												customer_policy.Customer_ID as cp_id,
												carriers.NAIC								
												FROM customer_policy 
												LEFT JOIN policy on customer_policy.Policy_Code=policy.Policy_Code
												LEFT JOIN carriers on customer_policy.Carrier_NAIC=carriers.NAIC
												WHERE customer_policy.PID='".$id."'
												");
				$getPolicy = mysqli_fetch_assoc($qpolicy);
				// carrier 
				echo json_encode($getPolicy);
 ?>