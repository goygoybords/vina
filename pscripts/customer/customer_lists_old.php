<?php
	ini_set('memory_limit', '-1');
	include("ifjson/isjson.php");
	include("sqlscripts/sqlscripts.php");
	function customer_list_sample_count($db)
	{
		$qcustomers = mysqli_query($db,"SELECT
											customers.Customer_ID as customerids,
											customers.CustomerID as custid,
											customers.Last_Name,
											customers.First_Name,
											customers.Middle_Name,
											customers.DOB,
											customers.Phone,
											customers.Phone_Alt,
											customers.Email,
											customers.Created_Date,
											customers.Review_Date,
											customer_address.City,
											customer_address.County,
											customer_address.Zip,
											customer_address.Address1,
											customer_address.State_ID,
		 									customer_business.businessname
											FROM `customers`
											LEFT JOIN `customer_address` on customers.Address_ID=customer_address.Address_ID
											LEFT JOIN `customer_business` on customers.CustomerID=customer_business.CustomerID
											");
	    $getcustomers = mysqli_num_rows($qcustomers);
		return $getcustomers;
	}
	function customer_list_sample($db,$limit='')
	{
		$qcustomers = mysqli_query($db,"SELECT
											customers.Customer_ID as customerids,
											customers.CustomerID as custid,
											customers.Last_Name,
											customers.First_Name,
											customers.Middle_Name,
											customers.DOB,
											customers.Phone,
											customers.Phone_Alt,
											customers.Email,
											customers.Created_Date,
											customers.Review_Date,
											customer_address.City,
											customer_address.County,
											customer_address.Zip,
											customer_address.Address1,
											customer_address.State_ID,
		 									customer_business.businessname
											FROM `customers`
											LEFT JOIN `customer_address` on customers.Address_ID=customer_address.Address_ID
											LEFT JOIN `customer_business` on customers.CustomerID=customer_business.CustomerID
											ORDER BY customers.CustomerID DESC
											LIMIT $limit
											");
	    $getcustomers = fetch_all_array($qcustomers);
		return $getcustomers;
	}

	function customer_list($db,$limit='')
	{
		$qcustomers = mysqli_query($db,"SELECT
											customers.Customer_ID as customerids,
											customers.CustomerID as custid,
											customers.Last_Name,
											customers.First_Name,
											customers.Middle_Name,
											customers.DOB,
											customers.Phone,
											customers.Phone_Alt,
											customers.Email,
											customers.Created_Date,
											customers.Review_Date,
											customer_address.City,
											customer_address.County,
											customer_address.Zip,
											customer_address.Address1,
											customer_address.State_ID,
		 									customer_business.businessname
											FROM `customers`
											LEFT JOIN `customer_address` on customers.Address_ID=customer_address.Address_ID
											LEFT JOIN `customer_business` on customers.CustomerID=customer_business.CustomerID
											ORDER BY customers.CustomerID DESC
											LIMIT $limit
											");
	    $getcustomers = fetch_all_array($qcustomers);
		return $getcustomers;
	}
	// view customer infos
	// policy type
	function policy_type($db)
	{
		$policytype = mysqli_query($db,"SELECT DISTINCT(Policy_Type),Policy_Code FROM policy GROUP BY Policy_Type ORDER BY Policy_Type ASC");
		$getpolicytype = fetch_all_array($policytype);
		return $getpolicytype;
	}
	// STATUS QOUTE
	function status_qoute($db)
	{
		$status_qoute = mysqli_query($db,"SELECT * FROM status_quote ORDER BY QStatus_ID ASC");
		$getstatus_qoute= fetch_all_array($status_qoute);
		return $getstatus_qoute;
	}
	// user
	function user($db)
	{
		$user = mysqli_query($db,"SELECT user.IBO_UserID,user.IBO_UserName FROM user WHERE Access_Level=1 ORDER BY IBO_UserName ASC");
		$getuser= fetch_all_array($user);
		return $getuser;
	}
	// customers
	function customers($db,$cusid='')
	{
		$customers = mysqli_query($db,"SELECT DISTINCT(customer_network.CustomerID),
											customer_network.CustomerID as cidd
											FROM customer_network
											WHERE customer_network.CustomerIDOrigin='".$cusid."' OR customer_network.CustomerID='".$cusid."'
											");
		$getcustomers= fetch_all_array($customers);
		return $getcustomers;
	}
// view customer infos
	function customers_info($db,$cusid='')
	{
		$qcustomers = mysqli_query($db,"SELECT
			                                C.Customer_ID as customerids,
			                                C.CustomerID as custid,
										 	C.Last_Name as customerlname,
										 	C.First_Name as customerfname,
										 	C.Middle_Name as customermname,
										 	C.DOB as customerdbo,
										 	C.Gender_ID as customergender,
										 	C.Phone as customerphone,
										 	C.Phone_Alt as customerphonealt,
										 	C.Email as customeremail,
										 	C.Created_Date as customerdatecreated,
										 	C.Review_Date as customerdatereview,
										 	C.Relation_ID as customerelationid,
										 	C.Status_ID as customerstat,
										 	C.Orig_Source_ID as customersourceid,
										 	C.Language_ID as customerlang,
										 	C.DL,
										 	C.DLstate as cdlstate,
										 	CA.State_ID as DLstate,
										 	SM.Marital_ID as smaritalID,
										 	CP.Phone as cphone,
										 	CP.Phonetype as cphonetype,
										 	customer_business.businessname
											FROM customers C
											LEFT JOIN customer_address CA on C.Address_ID=CA.Address_ID
											LEFT JOIN status_marital SM on C.Marital_ID=SM.Marital_ID
											LEFT JOIN customer_phone CP on C.CustomerID=CP.CustomerID
											LEFT JOIN `customer_business` on C.CustomerID=customer_business.CustomerID
											WHERE C.CustomerID='".$cusid."'
											");
	    $getcustomers = fetch_all_array($qcustomers);
		return $getcustomers;
	}
	// notes tab
	function customer_note($db, $cusidb='')
	{
		$qnotes = mysqli_query($db,"SELECT CN.Customer_ID as cid,CN.IBO_UserID as uid,MAX(CN.Note_ID) as latest
										FROM customer_note CN
										WHERE CN.Customer_ID='".$cusidb."'
										GROUP BY CN.IBO_UserID
										ORDER BY CN.Review_Date DESC
										");
		$getNotes = fetch_all_array($qnotes);
		return $getNotes;
	}
	// tab rating
	function customers_policy($db,$cusidb='')
	{
		$qpolicy = mysqli_query($db, "SELECT *
											FROM customer_policy CP
											LEFT JOIN policy P on CP.Policy_Code=P.Policy_Code
											LEFT JOIN carriers C on CP.Carrier_NAIC=C.NAIC
											LEFT JOIN status_policy SP on CP.StatusID=SP.StatusID
											WHERE CP.Customer_ID='".$cusidb."'
											"); //
		$getPolicy = fetch_all_array($qpolicy);
		return $getPolicy;
	}
	// tab qoute
	function customer_quotes($db, $cusid='')
	{
		$qQoute = mysqli_query($db, "SELECT customer_quote.QID as qouteid,
											customer_quote.Quote,
											customer_quote.YearTotal,
											customer_quote.QuoteDate as qdate,
											customer_quote.Bind as qbind,
											customer_quote.Effective as qeff,
											carriers.Company as carCom,
											policy.Policy_Type,
											status_quote.QStatus_Desc,
											user_detail.firstname as ufname
											FROM `customer_quote`
											LEFT JOIN `carriers` on customer_quote.NAIC=carriers.NAIC
											LEFT JOIN `policy` on customer_quote.Policy_Code=policy.Policy_Code
											LEFT JOIN `status_quote` on customer_quote.QStatus_ID=status_quote.QStatus_ID
											LEFT JOIN `user_detail` on customer_quote.IBO_UserID=user_detail.IBO_UserID
											WHERE customer_quote.CustomerID='".$cusid."'
											");
		$getQ = fetch_all_array($qQoute);
		return $getQ;
	}
	//  tab rating
	function customer_claim($db,$cusid='')
	{


		$qclaim = mysqli_query($db,"SELECT CN.CustomerID as cidd
										FROM customer_network CN
										LEFT JOIN customers C on (CN.CustomerID = C.CustomerID OR CN.CustomerIDOrigin = C.CustomerID)
										WHERE CN.CustomerID='".$cusid."'
										");
		$getClaim = fetch_all_array($qclaim);
		return $getClaim;
	}
	// auto violation
	function auto_violation($db)
	{
		$qauto_violation = mysqli_query($db,"SELECT
			                                auto_violation.VT_ID as vtID,
			                                auto_violation.Violation as vtVioldation
											FROM auto_violation
											");
	    $getauto_violation= fetch_all_array($qauto_violation);
		return $getauto_violation;
	}
	// status relation
	function status_relation($db)
	{
		$qcustomers = mysqli_query($db,"SELECT
			                                SR.Relation_ID as srid,
			                                SR.Relationship as srship
											FROM status_relation SR
											");
	    $getcustomers = fetch_all_array($qcustomers);
		return $getcustomers;
	}
	// marital status
	function status_marital($db)
	{
		$qcustomers = mysqli_query($db,"SELECT
			                                SM.Marital_ID as smid,
			                                SM.Marital as smarital
											FROM status_marital SM
											");
	    $getcustomers = fetch_all_array($qcustomers);
		return $getcustomers;
	}
	// customer status
	function status_customer($db)
	{
		$qcustomers = mysqli_query($db,"SELECT
			                                SC.Status_ID as scid,
			                                SC.Status_Desc as scdesc
											FROM status_customer SC
											");
	    $getcustomers = fetch_all_array($qcustomers);
		return $getcustomers;
	}
	// languages
	function languages($db)
	{
		$qlanguages = mysqli_query($db,"SELECT *
											FROM languages
											");
	    $getlanguages = fetch_all_array($qlanguages);
		return $getlanguages;
	}
	// Business Name
	function business_name($db, $cusid='')
	{
		$qnaic = mysqli_query($db,"SELECT DISTINCT(CP.Carrier_NAIC)
										 	CP.Carrier_NAIC as cpcarrier,
										 	C.NAIC as cnaic,
										 	C.Company as ccompany
											FROM customer_policy CP
											LEFT JOIN carriers C on CP.Carrier_NAIC=C.NAIC
											WHERE CP.CustomerID='".$cusid."'
											GROUP BY CP.Carrier_NAIC
											");
		$getnaic = fetch_all_array($qnaic);
		return $getnaic;
	}
	// status source
	function status_source($db)
	{
		$qsource = mysqli_query($db,"SELECT
									 	SS.Orig_Source_ID as ssid,
									 	SS.Orig_Source as ssource
										FROM status_source SS");

		$gets = fetch_all_array($qsource);
		return $gets;
	}

	// Home tab
	function home_list($db, $cusid=''){
		$qhome = mysqli_query($db, "SELECT CHP.HPID,
									CHP.Policy_No,
									CA.Address1,
									CA.AddressID as caid,
									CHI.HAID as chi
									FROM customer_home_policy CHP
									LEFT JOIN customer_address CA ON CA.Address_ID = CHP.Address_ID
									LEFT JOIN customers C ON C.Customer_ID = CA.Customer_ID
									LEFT JOIN customer_home_info CHI ON C.Address_ID = CHI.Address_ID
									WHERE C.CustomerID = '".$cusid."'
									"); // WHERE C.CustomerID = '".$cusid."'

		$geth = fetch_all_array($qhome);

		return $geth;
	}
	function vehicle_list($db, $cusidb=''){
		$qvehicle = mysqli_query($db,"SELECT 
										CAP.VPID as vpid, CAI.VIN as vin, MV.Manufacturer,CAI.VehicleID as caiVID,
										CAI.Model,CAI.Model_Year
										FROM customer_auto_policy CAP
										LEFT JOIN customer_auto_info CAI ON CAI.Vehicle_ID = CAP.Vehicle_ID
										LEFT JOIN mfg_vehicle MV ON MV.MFG_ID = CAI.MFG_ID
										LEFT JOIN customers C ON C.Customer_ID = CAI.Customer_ID
										WHERE CAI.Customer_ID = '".$cusidb."' ");
										// -- WHERE C.CustomerID = '".$cusid."' ");

		$getv = fetch_all_array($qvehicle);
		return $getv;
	}
	// family
	function family_list($db, $cusid=''){
		$qfamily = mysqli_query($db,"SELECT DISTINCT(customer_network.CustomerIDOrigin),
										customer_network.CustomerID as cnCID,
										customer_network.CustomerIDOrigin as cnOrgCID
										FROM customer_network
										WHERE ( customer_network.CustomerID='".$cusid."' OR customer_network.CustomerIDOrigin='".$cusid."' )
										");

		$getf = fetch_all_array($qfamily);
		return $getf;
	}
	// 
		function family_option_list($db, $cusid=''){
		$qfamily = mysqli_query($db,"SELECT *
												FROM customer_network CN
												LEFT JOIN customers C ON CN.CustomerID = C.CustomerID
												LEFT JOIN customer_secinfo CS ON CS.Customer_ID = C.Customer_ID
												WHERE CN.CustomerIDOrigin = (SELECT id FROM customers WHERE CustomerID = '".$cusid."' LIMIT 1)");
		$var = '';
		$getf = fetch_all_array($qfamily);
		foreach($getf as $family){
		$var .= "<option value='".$family['State_Abbreviation']."'>".$family['State_Name']."</option>";
		}

		return $var;
	}
	// Violation tab
	function violation_list($db, $cusid=''){
		$qviolation = mysqli_query($db,"SELECT CAV.id as cavid, C.Last_Name,
										C.First_Name,
										AV.Violation,
										CAV.Violation_Date,
										CAV.Violation_Amount,
										C.CustomerID FROM customer_auto_violation CAV
										LEFT JOIN customers C ON CAV.Customer_ID = C.Customer_ID
										LEFT JOIN auto_violation AV ON AV.VT_ID = CAV.VT_ID
										WHERE C.CustomerID = '".$cusid."'
										"); // WHERE C.CustomerID = '".$cusid."' 

		$getv = fetch_all_array($qviolation);
		return $getv;
	}


	function state_list($db){
		$query = mysqli_query($db, "SELECT * FROM `united_states`" );

		$getstates = fetch_all_array($query);
		$var = '';
		foreach($getstates as $state){
		$var .= "<option value='".$state['State_Abbreviation']."'>".$state['State_Name']."</option>";
		}
		return $var;
	}
	function carrier_list($db){
		$query = mysqli_query($db, "SELECT * FROM `carriers`" );

		$getstates = fetch_all_array($query);
		$var = '';
		foreach($getstates as $state){
		$var .= "<option value='".$state['NAIC']."'>".$state['Company']."</option>";
		}
		return $var;
	}
	function garage_list($db){
		$query = mysqli_query($db, "SELECT * FROM `garages`" );

		$getgarages = fetch_all_array($query);
		$var = '';
		foreach($getgarages as $garage){
		$var .= "<option value='".$garage['Garage_ID']."'>".$garage['Garage']."</option>";
		}
		return $var;
	}
	function exterior_wall_list($db){
		$query = mysqli_query($db, "SELECT * FROM `exterior_walls`" );

		$getexterior_wall = fetch_all_array($query);
		$var = '';
		foreach($getexterior_wall as $wall){
		$var .= "<option value='".$wall['ExteriorWall_ID']."'>".$wall['Exterior_Wall']."</option>";
		}
		return $var;
	}
	function manufacturer_list($db){
		$query = mysqli_query($db, "SELECT * FROM `mfg_vehicle`" );

		$getexterior_wall = fetch_all_array($query);
		$var = '';
		foreach($getexterior_wall as $wall){
		$var .= "<option value='".$wall['Manufacturer']."'>".$wall['Manufacturer']."</option>";
		}
		return $var;
	}
	function list_of_violation($db){
		$query = mysqli_query($db, "SELECT * FROM `auto_violation`" );

		$getviolation = fetch_all_array($query);
		$var = '';
		foreach($getviolation as $violation){
		$var .= "<option value='".$violation['VT_ID']."'>".$violation['Violation']."</option>";
		}
		return $var;
	}


 ?>