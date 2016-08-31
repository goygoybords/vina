<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();

		if(isset($_POST))
		{
				
				$data['Carrier_NAIC'] = mysqli_real_escape_string($db,$_POST['carrier']);
				$data['PolicyNo']     = mysqli_real_escape_string($db,$_POST['pnumber']);
				$data['StatusID']     = mysqli_real_escape_string($db,$_POST['status']);
				$data['Policy_Code']  = mysqli_real_escape_string($db,$_POST['policyType']);
				$data['Bind_Date']    = strtotime($_POST['bind_date']);
				$data['Expire_Date']  = strtotime($_POST['expire_date']);
				
				if($_POST['polUp']>0 || $_POST['polUp']!="")
				{
			        $id = $_POST['polUp'];
			        $data['Review_Date']  = $unixtime;
			        
			        $data['RenewPremium']   = mysqli_real_escape_string($db,$_POST['pamount']);
					$success = query_update($db, "customer_policy",$data, "PID='".$id."'");
					echo $success."--"."update";

				}else{
					$data['CustomerID']   = $_POST['polID']; 
					$data['Customer_ID']  = $_POST['pol_ID'];

					$data['Premium']   = mysqli_real_escape_string($db,$_POST['pamount']);
					$success = query_insert($db,"customer_policy",$data);
			       
			        echo $success."--"."insert";
				}

			
		}

	closedb();
 ?>