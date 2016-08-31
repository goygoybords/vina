<?php
include("../../include/ifjson/isjson.php");
include("../../include/sqlscripts/sqlscripts.php");
require("../../include/db/dbconnect.php");

opendb();

$id = '';
if($_POST['id']) $id = $_POST['id'];

$qviolation = mysqli_query($db,"SELECT CAV.id,C.Last_Name,
										C.First_Name,
										CAV.VT_ID,
										AV.Violation,
										CAV.Violation_Date,
										CAV.Violation_Amount,
										C.CustomerID as CID
										FROM customer_auto_violation CAV
										LEFT JOIN customers C ON CAV.Customer_ID = C.Customer_ID
										LEFT JOIN auto_violation AV ON AV.VT_ID = CAV.VT_ID
										WHERE CAV.id = '".$id."'");

$getv = mysqli_fetch_assoc($qviolation);

$getv['Violation_Date'] = strftime("%m/%d/%Y", $getv['Violation_Date']);

echo json_encode($getv);

closedb();

?>