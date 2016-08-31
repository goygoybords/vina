<?php
include("../../include/ifjson/isjson.php");
include("../../include/sqlscripts/sqlscripts.php");
require("../../include/db/dbconnect.php");

opendb();

$id = '';
if($_POST['id']) $id = $_POST['id'];
$qvehicle = mysqli_query($db,"SELECT 
							CAP.VPID as CAPID,
							CAP.Vehicle_ID,
							CAP.Carrier_NAIC,
							CAP.Expire_Date,
							CAI.id as CAIID,
							CAP.Premium,
							CAP.Term,
							CAP.Bodily_Injury,
							CAP.Property_Damage,
							CAP.Collision,
							CAP.Comprehensive,
							CAP.Medical,
							CAP.PIP, 
							CAP.Rental,
							CAP.Towing, 
							CAP.BI_UINUNI,
							CAP.PD_UINUNI,
							CAI.VIN, 
							CAI.Model, 
							CAI.Model_Year, 
							CAI.MFG_ID,

							
							MV.Manufacturer
							FROM customer_auto_policy CAP
							LEFT JOIN customer_auto_info CAI ON CAI.Vehicle_ID = CAP.Vehicle_ID
							LEFT JOIN mfg_vehicle MV ON MV.MFG_ID = CAI.MFG_ID
							LEFT JOIN customers C ON C.Customer_ID = CAI.Customer_ID
							WHERE CAP.VPID = '".$id."' ");


$getv = mysqli_fetch_assoc($qvehicle);

$getv['Expire_Date'] = strftime("%m/%d/%Y", $getv['Expire_Date']);
echo json_encode($getv);

closedb();

?>