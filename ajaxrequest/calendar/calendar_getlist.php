<?php 
	$events = array();
	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
	$sql = "SELECT * FROM calendar_events WHERE status = 1 ";
	$cmd = $db->query($sql);
	$result = $cmd->fetchAll();
	foreach ($result as $r ) 
	{
		  $e = array();
	     $e['id'] = $r['id'];
	     $e['title'] = $r['title'];
	     $e['start'] = $r['start'];
	     $e['end'] = $r['end'];
	     $e['url'] = "calendar_details.php?id=".$r['id'];
	     array_push($events, $e);
	}
	echo json_encode($events);

?>