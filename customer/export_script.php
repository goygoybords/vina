<?php
	
	function connectDb()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		return $db;
	}

	function customers_info($cusid='')
	{
		$db = connectDb();
		$sql = "SELECT c.* , 
					cam.title,
					sm.Marital,
					sr.Relationship,
					sec.CSSN as ssn,
				 	sec.CDL as DL,
				 	sec.CDL_State as cdlstate,
				 	sc.Status_Desc,
				 	src.Orig_Source,
				 	bus.businessname,
				 	l.Language_Name

				FROM customers c 
				LEFT JOIN campaign cam
				ON c.campaign_id = cam.campaign_id
				LEFT JOIN status_marital sm
				ON c.Marital_ID = sm.Marital_ID
				JOIN status_relation sr
				ON c.Relation_ID = sr.Relation_ID

				LEFT JOIN customer_business bus on c.CustomerID = bus.CustomerID
				LEFT JOIN customer_secinfo sec on c.Customer_ID = sec.Customer_ID
				LEFT JOIN status_customer sc ON c.Status_ID = sc.Status_ID
				LEFT JOIN status_source src on c.Orig_Source_ID = src.Orig_Source_ID
				LEFT JOIN languages l ON c.Language_ID = l.Language_ID
				
				WHERE c.CustomerID = ? ";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($cusid));
	   	$result = $cmd->fetch();
		return $result;
	}
	function getPhone($id)
	{
		$db = connectDb();
		$sql = "SELECT Phone FROM customer_phone WHERE CustomerID = ? ";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($id));
	   	$result = $cmd->fetch();
		return $result;
	}

	function home_list($cusidb='')
	{
		$db = connectDb();
		$cusID = substr($cusidb,0,-3);
		$sql = "SELECT CA.Address_ID, CA.Address1, CA.Address2, CA.City, CA.Zip,
				us.State_Name
				FROM customer_address CA 
				JOIN united_states us ON CA.State_ID = us.State_Abbreviation
				WHERE CA.Customer_ID LIKE ?";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($cusID."%"));
		$result = $cmd->fetchAll();
		return $result;
	}
	function home_list_detail($address_id)
	{
		$db = connectDb();
		$sql = "SELECT ch.Build_Date, ch.SqFt, ch.Levels, ch.Alarm,
				g.Garage,
				cp.Coverage, cp.Premium, 
				c.Company, e.Exterior_Wall
				FROM customer_home_info ch
				JOIN garages g ON ch.Garage_ID = g.Garage_ID
				JOIN customer_home_policy cp ON ch.Address_ID = cp.Address_ID 
				JOIN carriers c ON cp.Carrier_NAIC = c.NAIC
				JOIN exterior_walls e ON ch.ExteriorWall_ID = e.ExteriorWall_ID 
				WHERE ch.Address_ID =  ?";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($address_id));
		$result = $cmd->fetchAll();
		return $result;
	}

	function vehicle_list($cusidb='')
	{	
		$db = connectDb();
		$cusID = substr($cusidb,0,-3);
		$sql = "SELECT 
				CAP.VPID as vpid, CAI.VIN as vin, CAP.*, MV.Manufacturer,CAI.VehicleID as caiVID,
				CAI.Model,CAI.Model_Year, car.Company
				FROM customer_auto_policy CAP
				 JOIN customer_auto_info CAI ON CAI.Vehicle_ID = CAP.Vehicle_ID
				 JOIN mfg_vehicle MV ON MV.MFG_ID = CAI.MFG_ID
				 JOIN carriers car ON car.NAIC = CAP.Carrier_NAIC
				WHERE CAI.Customer_ID LIKE ? ";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($cusID."%"));
		$result = $cmd->fetchAll();
		return $result;
	}

	function family_list($cusidb='', $cusid)
	{
		$db = connectDb();
		$cusID = substr($cusidb,0,-3);
		$sql = "SELECT c.First_Name, c.Last_Name , sr.Relationship, sec.CSSN as ssn , sc.Status_Desc
				FROM customers c 
				JOIN status_relation sr 
				ON c.Relation_ID = sr.Relation_ID
				JOIN customer_secinfo sec 
				ON c.Customer_ID = sec.Customer_ID
				JOIN status_customer sc
				ON c.Status_ID = sc.Status_ID

				WHERE c.Customer_ID LIKE ? AND c.CustomerID != ? ";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($cusID."%",$cusid));
		$result = $cmd->fetchAll();
		return $result;
	}
	function note_list($cusidb)
	{
		$db = connectDb();
		$cusID = substr($cusidb,0,-3);
		$sql = "SELECT cn.Type, cn.Review_Date, cn.Note_Subj, cn.Note_Text,
				u.firstname, u.lastname
				FROM customer_note cn
				JOIN user_detail u
				ON cn.IBO_UserID = u.IBO_UserID 
				WHERE Customer_ID LIKE ?";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($cusID."%"));
		$result = $cmd->fetchAll();
		return $result;

	}
?>