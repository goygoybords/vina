<?php

	$id = $_POST['pid'];
	

	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		
	$sql = "DELETE FROM  mfg_vehicle WHERE MFG_ID = ?";
	$cmd = $db->prepare($sql);
	$res = $cmd->execute(array($id));
	if($res)
		echo json_encode(["msg" => "deleted"],JSON_PRETTY_PRINT);
	else
		echo "0";

	
?>