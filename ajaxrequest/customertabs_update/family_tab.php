<?php
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();

	opendb();
	print_r($_POST);


	if(isset($_POST))
	{

		$id = $_POST['cusid'];

		$customer['Last_Name'] = $_POST['lastname'];
		$customer['First_Name'] = $_POST['firstname'];
		$customer['Middle_Name'] = $_POST['middlename'];
		$customer['Gender_ID'] = $_POST['gender'];
		$customer['DOB'] = strtotime($_POST['dob']);
		// Customer Secinfo
		$dataDL['CDL']  = mysqli_real_escape_string($db,$_POST['dllicense']);
		$dataDL['CDL_State']  = mysqli_real_escape_string($db,$_POST['dlstate']);
		$dataDL['CSSN']  = mysqli_real_escape_string($db,$_POST['familyssnumber']);
		$dataDL['Review_Date']  = strtotime($_POST['followupdate']);
		// 
		$customer['Phone'] = json_encode($_POST['familyphone']);
		$customer['Marital_ID'] = $_POST['marital'];
		$customer['Relation_ID'] = $_POST['insured'];
		$customer['Status_ID'] = $_POST['status'];
		$customer['Language_ID'] = $_POST['language'];
		$customer['Orig_Source_ID'] = $_POST['source'];
		$customer['Language_ID'] = $_POST['language'];
		$customer['EMail'] = $_POST['familyemail'];
		// $note = $_POST['note'];Bname

		// $customers
		$b = "";
		if($_POST['familyID'] > 0 || $_POST['familyID'] !=''){

		  	$customer['Review_Date'] = $unixtime;
		  	$cpid = $_POST['CPID'];
			$c = query_update($db, "customers", $customer, "CustomerID='".$_POST['CID']."'");

			if($_POST['BID'] > 0 || $_POST['BID'] !='')
			{
				$datab['businessname'] = $_POST['Bname'];
				$datab['datecreated'] = $unixtime;
				$cb = query_update($db, "customer_business",$datab, "CustomerID='".$_POST['CID']."'");
			}else{

				$datab['CustomerID'] = $id;
				$datab['businessname'] = $_POST['Bname'];
				$datab['datecreated'] = $unixtime;

				$cb = query_insert($db, "customer_business", $datab);
			}

			if($_POST['CPID'] > 0 || $_POST['CPID'] !='')
			{
				$dataphone['Phone']  = json_encode($_POST['familyphone']);
				$dataphone['PhoneType'] = json_encode($_POST['familyphonetype']);
				$cp = query_update($db,"customer_phone",$dataphone, "id='".$_POST['CPID']."'");
			}else{
				// Customer Phone
				$dataphone['CustomerID']  = $id;
				$dataphone['Phone']  = json_encode($_POST['familyphone']);
				$cp = query_insert($db,"customer_phone",$dataphone);
			}
			// DLSTATE
			$dl = query_update($db, "customer_secinfo",$dataDL, "Customer_ID='".$_POST['cus_iD']."'");

			echo "UPDATED C-".$c."CB-".$cb."CP-".$cp;

		}else{
			
	        if($_POST['gender']=="")
	        {
	        	$gender = "X";
	        }else{
	        	$gender = $_POST['gender'];
	        }
	       
	        $id = substr($_POST['cus_iD'],0,-3);
	        $text = $gender;
	        $numbers = substr(str_shuffle(str_repeat("0123456789", 2)), 0, 2);
	        // generate Customer_ID
	        $genText = $id.$text.$numbers;
	        $customer['Customer_ID'] = $genText;
			$customer['Review_Date'] = $unixtime;
			$re = query_insert($db,"customers",$customer);

			$checNET = mysqli_query($db, "SELECT * FROM customer_network WHERE CustomerID='".$_POST['cusid']."'" );
			$cout = mysqli_num_rows($checNET);
			// DLSTATE
			$dataDL['Customer_ID']  = $genText;
			$dl = query_insert($db, "customer_secinfo", $dataDL);

			if($cout<=0)
			{
				$customer_network['CustomerID'] = $re;
				$customer_network['CustomerIDOrigin'] = $_POST['cusid'];
				$customer_network['CreatedDate'] = $unixtime;
				$cn = query_insert($db, "customer_network", $customer_network);
			}
			
			if($_POST['BID'] > 0 || $_POST['BID'] !='')
			{
				$cb = query_update($db, "customer_business",$datab, "CustomerID='".$_POST['CID']."'");
			}
			else
			{

				$datab['CustomerID'] = $re;
				$datab['businessname'] = $_POST['Bname'];
				$datab['datecreated'] = $unixtime;

				$cb = query_insert($db, "customer_business", $datab);
			}
			
			if($_POST['CPID'] > 0 || $_POST['CPID'] !='')
			{
				$cp = query_update($db,"customer_phone",$dataphone, "id='".$_POST['CID']."'");
			}
			else
			{
				// Customer Phone
				$dataphone['CustomerID']  = $re;
				$dataphone['Phone']  = json_encode($_POST['familyphone']);
				$dataphone['PhoneType'] = json_encode($_POST['familyphonetype']);
				$cp = query_insert($db,"customer_phone",$dataphone);
			}

			echo "INSERTED C-".$cn."CB-".$cb."CP-".$cp;
		}
	}
	
	

	closedb();
?>