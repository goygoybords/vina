<?php
	if(isset($_POST))
	{
		extract($_POST);
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		if($_POST['update'] == "true")
		{
			$sql = "UPDATE auto_violation 
					SET Violation = ?  
					WHERE id = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($vio_des, $violation_id));
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		}

		else
		{
			$sql = "SELECT Violation FROM auto_violation WHERE Violation like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($vio_des));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{
				$sql = "SELECT MAX(VT_ID) as 'bigID' FROM auto_violation";
				$cmd = $db->query($sql);
				$result = $cmd->fetch();
				$max = $result['bigID'] + 1;
				if($max)
				{
					$sql = "INSERT INTO auto_violation VALUES (DEFAULT, ?,?)";
					$cmd = $db->prepare($sql);
					$res = $cmd->execute(array($max,$vio_des));
						if($res)
							echo json_encode(["msg" => "inserted"],JSON_PRETTY_PRINT);
						else
							echo "0";
				}
			}
		}
	}
?>