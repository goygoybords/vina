<?php
 ini_set('memory_limit', '-1');
 set_include_path('../../include');
 require("db/dbconnect.php");
 require("sqlscripts/sqlscripts.php");
 $unixtime=time();
 opendb();
 $vehicleinfoid = $_POST['vehicleinfoid']; // $vehicleid =
 $_POST['vehicleid'];

 // $vin= $_POST['vin'];
 // $manufacturer = $_POST['manufacturer'];

 // $model = $_POST['model'];
 // $modelyear = $_POST['modelyear'];
 $customerid = $_POST['customerid'];

 $query = mysqli_query($db,"SELECT * FROM customers WHERE CustomerID = '$customerid'");
 $result = mysqli_fetch_assoc($query);

 $data['VIN'] = $_POST['vin'];
 $data['MFG_ID'] = $_POST['manufacturer'];
 $data['Model'] = $_POST['model'];
 $data['Model_Year'] = $_POST['modelyear'];


 $vehicleid = $_POST['vehicleid'];

 $vehicle['Expire_Date'] = strtotime($_POST['expirationdate']);
 $vehicle['Carrier_NAIC'] = $_POST['carrier'];
 $vehicle['Bodily_Injury'] = $_POST['bodyinjury'];
 $vehicle['Property_Damage'] = $_POST['property'];
 $vehicle['Collision'] = $_POST['collision'];
 $vehicle['Comprehensive'] = $_POST['comp'];
 $vehicle['Medical'] = $_POST['medical'];
 $vehicle['PIP'] = $_POST['pip'];
 $vehicle['Rental'] = $_POST['rental'];
 $vehicle['Towing'] = $_POST['towing'];
 $vehicle['BI_UINUNI'] = $_POST['body2'];
 $vehicle['PD_UINUNI'] = $_POST['property2'];
 $vehicle['Premium'] = $_POST['premium'];
 $vehicle['Term'] = $_POST['term'];

 if($vehicleinfoid == ''){
  $numbs = substr(str_shuffle(str_repeat("0123456789", 7)), 0, 7); //$rescid['latest']+100001;
  $text = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 2)), 0, 2);
  $vehicle['Vehicle_ID'] = $numbs.$text;

  $VehicleID =  query_insert($db, "customer_auto_policy", $vehicle);

  $data['Customer_ID'] = $result['Customer_ID'];
  $data['Vehicle_ID'] = $numbs.$text;
  $data['VehicleID'] = $VehicleID;
  echo query_insert($db, "customer_auto_info", $data);

 }else{

  // $data['VehicleID'] = $_POST['vehicleid'];
  $vin = $_POST['vin'];
  $manufacturer = $_POST['manufacturer'];
  $model = $_POST['model'];
  $modelyear = $_POST['modelyear'];

  echo mysqli_query($db, "UPDATE `customer_auto_info`
          SET `VIN` = '$vin',
          `MFG_ID` = '$manufacturer',
          `Model` = '$model',
          `Model_Year` = '$modelyear'
          WHERE id = $vehicleinfoid");


  $b = query_update($db, "customer_auto_policy", $vehicle, "Vehicle_ID='".$vehicleid."'");
  echo $b;
 }

 echo mysqli_error($db);



 closedb();

?>