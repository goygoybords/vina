<?php
	
	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT c.*, cu.Last_Name, cu.First_Name
				FROM calendar_events c
				JOIN customers cu
				ON  c.CustomerID = cu.CustomerID
				WHERE c.status = 1 ORDER BY 1 DESC";
		$cmd = $db->query($sql);
		$events = $cmd->fetchAll();

		echo json_encode( $events );

	
?>

