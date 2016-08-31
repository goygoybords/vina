<?php
	error_reporting(E_ALL);
	if(isset($_POST))
	{
		extract($_POST);
		$start_date = date('Y-m-d', strtotime($cal_start_date) );
		$end_date = date('Y-m-d', strtotime($cal_end_date) );
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		
		if($_POST['update'] == "true")
		{
			$sql = "UPDATE calendar_events
					SET 
					title = ?,
					description = ?,
					start = ?,
					end = ? 
					WHERE id = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($cal_title, $cal_description, $start_date, $end_date, $cal_id));
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		 }
		else
		{
			$sql = "SELECT title FROM calendar_events WHERE title like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($cal_title));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{	
				$sql = "INSERT INTO calendar_events VALUES (DEFAULT,?,?,?,?,?)";
				$cmd = $db->prepare($sql);
				$res = $cmd->execute(array($cal_title, $cal_description, $start_date, $end_date, 1));
					if($res)
						echo json_encode(["msg" => "inserted"],JSON_PRETTY_PRINT);
					else
						echo "0";
			}
		}
	}
?>