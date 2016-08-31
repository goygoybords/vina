<?php
include("../../include/ifjson/isjson.php");
include("../../include/sqlscripts/sqlscripts.php");
require("../../include/db/dbconnect.php");

opendb();
$id = '';
if($_POST['id']) $id = $_POST['id'];

$query = mysqli_query($db, "SELECT *,CA.AddressID as CAID,CA.type,
									CHP.HPID as CHPID, CHI.HAID as CHIID,
									CHI.Build_Date as bdate,CA.Customer_ID as cidd

									FROM customer_home_policy CHP
									LEFT JOIN customer_home_info CHI ON CHP.Address_ID = CHI.Address_ID
									LEFT JOIN customer_address CA ON CA.Address_ID = CHP.Address_ID
									LEFT JOIN customers C ON C.Customer_ID = CA.Customer_ID
									WHERE CHP.HPID ='".$id."' ");

$geth = mysqli_fetch_assoc($query);
if($geth['Expire_Date']==0 || $geth['Expire_Date']=='')
{
	$geth['Expire_Date'] = "";
}else{
	$geth['Expire_Date'] = strftime("%m/%d/%Y", $geth['Expire_Date']);
}


echo json_encode($geth);

closedb();

?>