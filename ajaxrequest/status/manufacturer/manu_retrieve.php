<?php
	$id = $_POST['id'];

	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
	$sql = "SELECT * FROM mfg_vehicle WHERE MFG_ID = ?";
	$cmd = $db->prepare($sql);
	$cmd->execute(array($id));
	$result = $cmd->fetch();

	
	echo json_encode($result);
	

?>