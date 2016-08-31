<?php
function opendb()
{
	global $db;
	// $db=mysqli_connect("localhost","root","","ibodb01");
	$db=mysqli_connect("localhost","vinaouts_vdusr01","VDdb01!@#","vinaouts_vddb01");
	if(mysqli_connect_errno()) echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

function closedb()
{
	global $db;
	mysqli_close($db);
}


opendb();

$query=mysqli_query($db,"SELECT `PID`,`Customer_ID` FROM `customer_policy` WHERE `CustomerID`<='0'");
while($data=mysqli_fetch_assoc($query))
{
	$CustomerID=mysqli_query($db,"SELECT `CustomerID` FROM `customers` WHERE Customer_ID='$data[Customer_ID]' LIMIT 1");
	$CustomerID=mysqli_fetch_assoc($CustomerID);
	mysqli_query($db,"UPDATE `customer_policy` SET `CustomerID`='$CustomerID[CustomerID]' WHERE `PID`='$data[PID]'");
}
closedb();
?>