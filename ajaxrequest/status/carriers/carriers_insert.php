<?php
	if(isset($_POST))
	{
		extract($_POST);
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		if($_POST['update'] == "true")
		{
			$sql = "UPDATE  carriers 
					SET Company = ?  
					WHERE id = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($company_des, $carrier_id));
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		}

		else
		{
			$sql = "SELECT Company FROM carriers WHERE Company like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($company_des));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{
				$sql = "SELECT MAX(NAIC) as 'bigID' FROM carriers";
				$cmd = $db->query($sql);
				$result = $cmd->fetch();
				$max = $result['bigID'] + 1;
				if($max)
				{
					$sql = "INSERT INTO carriers VALUES (DEFAULT, ?,? ,? )";
					$cmd = $db->prepare($sql);
					$res = $cmd->execute(array($max, $company_des, 1));
						if($res)
							echo "1";
						else
							echo "0";
				}
			}
		}
	}
?>