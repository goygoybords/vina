<?php
	
	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		
	$sql = "UPDATE calendar_events
					SET status = ?					
					WHERE id = ?";
	$cmd = $db->prepare($sql);
	$res = $cmd->execute(array(0 , $_POST['pid']));
	if($res)
		echo json_encode(["msg" => "deleted"],JSON_PRETTY_PRINT);
	else
		echo "0";

	
?>