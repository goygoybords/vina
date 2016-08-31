<?php 
	$id = $_POST['id'];
	//$customer = $_GET['customer'];
	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
	$sql = "UPDATE customer_rating
			SET is_active = ?
			WHERE RID = ?";
	$cmd = $db->prepare($sql);
	$res = $cmd->execute(array(0, $id));
	echo $res;
	//header("location: ../../customer/customer_information?ret=".$customer);

 ?>


