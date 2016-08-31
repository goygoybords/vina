<?php
	if(isset($_POST))
	{
		extract($_POST);
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		if($_POST['update'] == "true")
		{
			$sql = "UPDATE  status_customer 
					SET Status_Desc = ?  
					WHERE id = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($stat_desc, $_POST['stat_cust_id']));
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		}

		else
		{
			$sql = "SELECT Status_Desc FROM status_customer WHERE Status_Desc like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($stat_desc));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{
				$sql = "SELECT MAX(Status_ID) as 'bigID' FROM status_customer";
				$cmd = $db->query($sql);
				$result = $cmd->fetch();
				$max = $result['bigID'] + 1;
				if($max)
				{
					$sql = "INSERT INTO status_customer VALUES (DEFAULT, ?,? )";
					$cmd = $db->prepare($sql);
					$res = $cmd->execute(array($max, $stat_desc));
						if($res)
							echo "1";
						else
							echo "0";
				}
			}
		}
	}
?>