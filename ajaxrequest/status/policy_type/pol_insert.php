<?php
	if(isset($_POST))
	{
		extract($_POST);
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		if($_POST['update'] == "true")
		{
			$sql = "UPDATE policy 
					SET Policy_Type = ?  
					WHERE id = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($pol_des, $policy_id));
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		}

		else
		{
			$sql = "SELECT Policy_Type FROM policy WHERE Policy_Type like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($pol_des));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{
				$sql = "SELECT MAX(Policy_Code) as 'bigID' FROM policy";
				$cmd = $db->query($sql);
				$result = $cmd->fetch();
				$max = $result['bigID'] + 1;
				if($max)
				{
					$sql = "INSERT INTO policy VALUES (DEFAULT, ?,?)";
					$cmd = $db->prepare($sql);
					$res = $cmd->execute(array($max,$pol_des));
						if($res)
							echo json_encode(["msg" => "inserted"],JSON_PRETTY_PRINT);
						else
							echo "0";
				}
			}
		}
	}
?>