<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();

		if(isset($_POST))
		{
				
				 $data['Policy_No'] 	 = mysqli_real_escape_string($db,$_POST['policynum']);
				 
				 $qcusto = mysqli_query($db,"SELECT Customer_ID
											FROM customers
											WHERE CustomerID='".$_POST['Customer']."'
											");

				$getC = fetch_all_array($qcusto)[0];
				 $data['Customer_ID'] 	 = mysqli_real_escape_string($db,$getC['Customer_ID']);
				 
				 $data['Incident_ID'] 	 = mysqli_real_escape_string($db,$_POST['typelost']);
				 $data['Claim_Amount'] 	 = mysqli_real_escape_string($db,$_POST['cAmount']);
				 $data['Incident_Date']  = strtotime($_POST['clmdate']);
				 $data['Driver_Fault'] 	 = mysqli_real_escape_string($db,$_POST['dfault']);
				 
				if($_POST['claimU']>0 || $_POST['claimU']!="")
				{
			        $id = $_POST['claimU'];
					$success = query_update($db, "customer_claim",$data, "Claim_ID='".$id."'");
					echo $success."--"."update";

				}else{
					$numbs = substr(str_shuffle(str_repeat("0123456789", 8)), 0, 8); //$rescid['latest']+100001;
			        $text = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 2)), 0, 2);
			        $data['Review_Date'] = $unixtime;
			        $data['Claim_ID'] = $text.$numbs;
					$success = query_insert($db,"customer_claim",$data);
			       
			        echo $success."--"."insert";
				}

			
		}

	closedb();
 ?>