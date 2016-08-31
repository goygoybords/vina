<?php
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();
		
		if(isset($_POST))
		{
			@$customerid = $_POST['inf'];
			if(!empty($_POST) && ($_POST['fname']!='' || $_POST['lname']!='' || $_POST['gender']!=''))
			{
				$data['Last_Name'] 	 = mysqli_real_escape_string($db,$_POST['lname']);
				$data['First_Name']  = mysqli_real_escape_string($db,$_POST['fname']);
				$data['Middle_Name']  = mysqli_real_escape_string($db,$_POST['mname']);
				$data['DOB']  = strtotime($_POST['dob']);
				
				$data['Email']  = mysqli_real_escape_string($db,$_POST['email']);
				$data['Language_ID']  = mysqli_real_escape_string($db,$_POST['language']);
				$data['Marital_ID']  = mysqli_real_escape_string($db,$_POST['marital']);
				$data['Gender_ID']  = mysqli_real_escape_string($db,$_POST['gender']);
				$dataDL['CDL']  = mysqli_real_escape_string($db,$_POST['dlicense']);
				$dataDL['CSSN']  = mysqli_real_escape_string($db,$_POST['ssnumber']);
				$dataDL['CDL_State']  = mysqli_real_escape_string($db,$_POST['dlstate']);
				
				$dataDL['Review_Date']  = strtotime($_POST['followupdate']);
				// 
				$data['Status_ID']  = mysqli_real_escape_string($db,$_POST['status']);
				$data['Orig_Source_ID']  = mysqli_real_escape_string($db,$_POST['source']);
				$data['Relation_ID']  = mysqli_real_escape_string($db,$_POST['insured']);
				$data['Review_Date'] = strtotime($_POST['followupdate']);
				$data['Created_Date'] = $unixtime;
				$data['campaign_id'] = $_POST['campaign_id'];
				if(empty($_POST['inf']) || $_POST['inf']<=0)
				{

			        $id = substr(str_shuffle(str_repeat("0123456789", 8)), 0, 8);
			        if($_POST['gender']=="")
			        {
			        	$gender = "X";
			        }else{
			        	$gender = $_POST['gender'];
			        }
			        $text = $gender;
			        $numbers = substr(str_shuffle(str_repeat("0123456789", 2)), 0, 2);
			        $genText = $id.$text.$numbers;
			        $data['Customer_ID'] = $genText;

					$re = query_insert($db,"customers",$data);
					// business
					$datab['CustomerID'] = $re;
					$datab['businessname'] = $_POST['bname'];
					$datab['datecreated'] = $unixtime;
					$b = query_insert($db, "customer_business", $datab);
					// Customer Phone
					$phoneEncode = json_encode($_POST['phone']);
					$phoneTypeEncode = json_encode($_POST['phonetype']);
			
					$dataphone['Phone'] = mysqli_real_escape_string($db,$phoneEncode);
					$dataphone['PhoneType'] = mysqli_real_escape_string($db,$phoneTypeEncode);
					$dataphone['CustomerID']  = $re;
					$res = query_insert($db,"customer_phone",$dataphone);

				 // 	for ($i=0; $i < count( $dataph = json_decode( $phoneEncode ) ) ; $i++) {
					// 		$dataphtype = json_decode ( json_encode($_POST['phonetype'])) ;
					// 		$pid = json_decode($phoneID);
					// 		$dataphone['PhoneType'] = mysqli_real_escape_string($db,$dataphtype[$i]);
					//  		$dataphone['Phone'] = mysqli_real_escape_string($db,$dataph[$i]);

					//  		$qPhone = mysqli_query($db,"SELECT * FROM customer_phone WHERE id='".$pid."'");
					// 		$getPhone = fetch_all_array($qPhone);

					// 		if(count($getPhone)!=0)
					// 		{
					// 			foreach($getPhone as $ph){
					// 				$q = query_update($db, "customer_phone",$dataphone, "id='".$ph['id']."'");
					// 			}
					// 			echo "updatee";
					// 		}else{
					// 			$dataphone['CustomerID']  = $customerid;
					// 			$res = query_insert($db,"customer_phone",$dataphone);
					// 			echo "ins";
					// 		}
					 			
					// }
					
					// DLSTATE
					$dataDL['Customer_ID']  = $genText;
					$dl = query_insert($db, "customer_secinfo", $dataDL);

					echo json_encode(["CustomerID" => $re, "Customer_ID" => $data['Customer_ID'] ],JSON_PRETTY_PRINT);

				}else{
					
					// business
					$datab['businessname'] = $_POST['bname'];
					$datab['datecreated'] = $unixtime;
					$b = query_update($db, "customer_business", $datab, "CustomerID='".$customerid."'");
					//Phone
					//Phone id does not exist ADD;
					$phoneID = $_POST['phoneid'];
					$phonequery = mysqli_query($db, "SELECT * FROM customer_phone WHERE CustomerID=".$customerid );
 					$getphoneinfo = fetch_all_array($phonequery);
					
					if(count($getphoneinfo) == 0 ){//insert
						$phoneEncode = json_encode($_POST['phone']);
						$phoneTypeEncode = json_encode($_POST['phonetype']);

						$dataphone['Phone'] = mysqli_real_escape_string($db,$phoneEncode);
						$dataphone['PhoneType'] = mysqli_real_escape_string($db,$phoneTypeEncode);
						$dataphone['CustomerID']  = $customerid;
						$res = query_insert($db,"customer_phone",$dataphone);
					}else{ //update
						$phoneEncode = json_encode($_POST['phone']);
						$data['Phone'] = mysqli_real_escape_string($db,$phoneEncode);						
						$phoneTypeEncode = json_encode($_POST['phonetype']);
						$dataphone['Phone'] = mysqli_real_escape_string($db,$phoneEncode);
						$dataphone['PhoneType'] = mysqli_real_escape_string($db,$phoneTypeEncode);

						$upCP = query_update($db, "customer_phone",$dataphone, "id='".$phoneID."' AND CustomerID='".$customerid."'");
					}

					$q = query_update($db, "customers", $data, "CustomerID='".$customerid."'");
					
					$dl = query_update($db, "customer_secinfo",$dataDL, "Customer_ID='".$_POST['c_ids']."'");

					echo json_encode(["msg" => "update", "CustomerID" => $customerid ],JSON_PRETTY_PRINT);
				}

			}else{
				echo 0;
			}
		}

	closedb();
 ?>