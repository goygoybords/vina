<?php
	error_reporting(E_ALL);
	if(isset($_POST))
	{

		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		extract($_POST);


		if($_POST['update'] == "true")
		{
			

			$sql = "UPDATE campaign
					SET 
					title = ?,
					alternate_title = ?,
					campaign_type = ?,
					cost_per_lead = ? ,
					email = ? ,
					note = ?,
					campaign_group = ? ,
					provider = ?
					
					WHERE campaign_id = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($camp_title, $camp_alt_title,  $campaign_type, $cost_per_lead, $campaign_email, $campaign_note, 
				$campaign_group, $campaign_providers, $camp_id));
		
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		 }
		else
		{
			$sql = "SELECT title FROM campaign WHERE title like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($camp_title));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{	
				$sql = "INSERT INTO campaign VALUES (DEFAULT,?,?,?,?,?,?,?,?,?)";
				$cmd = $db->prepare($sql);
				$res = $cmd->execute(array($camp_title, $camp_alt_title,  $campaign_type, $cost_per_lead, $campaign_email, $campaign_note, 
				$campaign_group, $campaign_providers, 1));
					if($res)
						echo json_encode(["msg" => "inserted"],JSON_PRETTY_PRINT);
					else
						echo "0";
			}
		}
	}
?>