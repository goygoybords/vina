<?php
	if(isset($_POST))
	{
		extract($_POST);
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		if($_POST['update'] == "true")
		{
			$sql = "UPDATE  status_source 
					SET Orig_Source = ?  
					WHERE id = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($source_des, $source_id));
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		}

		else
		{
			$sql = "SELECT Orig_Source FROM status_source WHERE Orig_Source like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($source_des));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{
				$sql = "SELECT MAX(Orig_Source_ID) as 'bigID' FROM status_source";
				$cmd = $db->query($sql);
				$result = $cmd->fetch();
				$max = $result['bigID'] + 1;
				if($max)
				{
					$sql = "INSERT INTO status_source VALUES (DEFAULT, ?,? )";
					$cmd = $db->prepare($sql);
					$res = $cmd->execute(array($max, $source_des));
						if($res)
							echo "1";
						else
							echo "0";
				}
			}
		}
	}
?>