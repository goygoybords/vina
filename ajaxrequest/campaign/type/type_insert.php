<?php
	if(isset($_POST))
	{
		extract($_POST);
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		if($_POST['update'] == "true")
		{
			$sql = "UPDATE  campaign_type 
					SET description = ?  
					WHERE id = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($type_des, $_POST['type_id']));
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		}

		else
		{
			$sql = "SELECT description FROM campaign_type WHERE description like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($type_des));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{
				
				$sql = "INSERT INTO campaign_type VALUES (DEFAULT, ?,? )";
				$cmd = $db->prepare($sql);
				$res = $cmd->execute(array($type_des , 1));
					if($res)
						echo "1";
					else
						echo "0";
				
			}
		}
	}
?>