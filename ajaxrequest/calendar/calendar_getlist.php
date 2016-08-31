<?php 
	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
	$sql = "SELECT * FROM calendar_events WHERE status = 1 ORDER BY 1 DESC";
	$cmd = $db->query($sql);
	$result = $cmd->fetchAll();
	echo json_encode($result);

?>