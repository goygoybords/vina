<?php
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();

	opendb();
	

if(isset($_POST))
{
	// customer_address
	$caid = $_POST['caid'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];

	$ca['Address1'] = $address1;
	$ca['Address2'] = $address2;
	$ca['County'] = $country;
	$ca['City'] = $city;
	$ca['State_ID'] = $state;
	$ca['Zip'] = $zipcode;
	$ca['type'] = $_POST['homeaddtype'];
	
	// customer_home_info
	$chiid = $_POST['chi'];
	$builddate= $_POST['builddate'];
	$roofdate= $_POST['roofdate'];
	$sqft= $_POST['sqft'];
	$levels = $_POST['levels'];
	$garage = $_POST['garage'];
	$capacity = $_POST['capacity'];
	$exteriorwall = '';
	if(isset($_POST['exteriorwall'])){
		$exteriorwall = $_POST['exteriorwall'];
	}
	$alarm = '';
	if(isset($_POST['alarms'])){
		$alarm = '1';
	}else{
		$alarm = '0';
	}

	$chi['Build_Date'] = $builddate;
	$chi['Roof_Date'] = $roofdate;
	$chi['SqFt'] = $sqft;
	$chi['Levels'] = $levels;
	$chi['Garage_ID'] = $garage;
	$chi['Garage_Capacity'] = $capacity;
	$chi['ExteriorWall_ID'] = $exteriorwall;
	$chi['Alarm'] = $alarm;
	// customer_home_policy
	$chpid = $_POST['chp'];
	$carrier = $_POST['carrier'];
	$expirationdate = $_POST['expirationdate'];
	$expirationdate = strtotime($_POST['expirationdate']);

	$coverage = $_POST['coverage'];
	$premium = $_POST['premium'];
	$deductible = $_POST['deductible'];
	$medical = $_POST['medical'];
	$lossofuse = $_POST['lossofuse'];
	$liability = $_POST['liability'];

	$chp['Carrier_NAIC'] = $carrier;
	$chp['Expire_Date'] = $expirationdate;
	$chp['Coverage'] = $coverage;
	$chp['Premium'] = $premium;
	$chp['Deductible'] = $deductible;
	$chp['Medical'] = $medical;
	$chp['LossOfUse'] = $lossofuse;
	$chp['Liability'] = $liability;



	if($_POST['caid']>0 || $_POST['caid']!='')
	{

	
	
	$resultt = query_update($db, "customer_address",$ca, "AddressID='".$caid."'");

	$query = mysqli_query($db,"SELECT MAX(AddressID),Address_ID FROM customer_address WHERE Customer_ID = '".$_POST['cus_ids']."'");
 	$res = mysqli_fetch_assoc($query);

	$cAdd['Address_ID'] = $res['Address_ID']; 

	$upC = query_update($db, "customers",$cAdd, "Customer_ID='".$_POST['cus_ids']."'");

	$qaddID = mysqli_query($db,"SELECT Address_ID as addID
								FROM customer_home_info
								WHERE Address_ID='".$res['Address_ID']."'
								");

	$getAdd = fetch_all_array($qaddID)[0];
	if(count($getAdd)!=0)
	{
		$chii = query_update($db, "customer_home_info",$chi, "HAID='".$chiid."'");
	}else{
		$chi['Address_ID'] = $res['Address_ID']; 
		$chii = query_insert($db,"customer_home_info",$chi);
	}
	

	$chpp = query_update($db, "customer_home_policy",$chp, "HPID='".$chpid."'");


	echo "UPDATED CA-".$resultt."CHI-".$chii."CHP-".$chpp;

	}else{
		$numbs = substr(str_shuffle(str_repeat("0123456789", 8)), 0, 8); //$rescid['latest']+100001;
		$text = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 1)), 0, 1);
		$ca['Customer_ID'] = $_POST['cus_ids'];
		$ca['Address_ID'] = $text.$numbs; 
		$cAdd['Address_ID'] = $text.$numbs; 
		
		$upC = query_update($db, "customers",$cAdd, "Customer_ID='".$_POST['cus_ids']."'");

		$resultt = query_insert($db,"customer_address",$ca);
		$qaddID = mysqli_query($db,"SELECT Address_ID as addID
									FROM customer_address
									WHERE id='".$resultt."'
									");

		$getAdd = fetch_all_array($qaddID)[0];
		$chi['Address_ID'] = $text.$numbs; 
		$chii = query_insert($db,"customer_home_info",$chi);
		$chp['Address_ID'] = $text.$numbs; 
		$chpp = query_insert($db,"customer_home_policy",$chp);

		; 
			
		echo "INSERTED CA-".$resultt."CHI-".$chii."CHP-".$chpp;
	}

	

}

	closedb();

?>