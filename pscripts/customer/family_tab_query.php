<?php
include("../../include/ifjson/isjson.php");
include("../../include/sqlscripts/sqlscripts.php");
require("../../include/db/dbconnect.php");

opendb();

$id = '';
if($_POST['id']) $id = $_POST['id'];

$qfamily = mysqli_query($db,"SELECT *, CSec.CDL as dl,C.CustomerID, CP.id as cpID,BN.BusinessID as BID,CP.Phone as cphone,
										CP.PhoneType as cptype,CP.id as cpid,
										CSec.CSSN as ssn,CSec.CDL as DL,CSec.CDL_State as cdlstate,C.Customer_ID as cus_iD
								FROM customers C
								LEFT JOIN customer_address CA ON CA.Address_ID = C.Address_ID
								LEFT JOIN customer_business BN ON BN.CustomerID = C.CustomerID
								LEFT JOIN customer_phone CP ON C.CustomerID = CP.CustomerID
								LEFT JOIN `customer_secinfo` CSec on C.Customer_ID=CSec.Customer_ID
								WHERE C.CustomerID = '".$id."' ");

$getf = mysqli_fetch_assoc($qfamily);

$getf['DOB'] = strftime("%m/%d/%Y", $getf['DOB']);
echo json_encode($getf);

closedb();

?>