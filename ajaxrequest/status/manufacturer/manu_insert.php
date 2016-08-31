<?php
	if(isset($_POST))
	{
		extract($_POST);
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		if($_POST['update'] == "true")
		{
			$sql = "UPDATE  mfg_vehicle 
					SET Manufacturer = ?  
					WHERE MFG_ID = ?";
			$cmd = $db->prepare($sql);
			$res = $cmd->execute(array($manu_des, $manufacturer_id));
			if($res)
				echo json_encode(["msg" => "update"],JSON_PRETTY_PRINT);
			else
				echo "0";
		}

		else
		{
			$sql = "SELECT Manufacturer FROM mfg_vehicle WHERE Manufacturer like ?";
			$cmd = $db->prepare($sql);
			$cmd->execute(array($manu_des));
			$result = $cmd->fetchAll();
			if(count($result) > 0 )
			{
				echo "0";
			}
			else
			{
				// $sql = "SELECT MAX(MFG_ID) as 'bigID' FROM mfg_vehicle";
				// $cmd = $db->query($sql);
				// $result = $cmd->fetch();
				// $max = $result['bigID'] + 10;
				// if($max)
				// {
					$sql = "INSERT INTO mfg_vehicle VALUES (DEFAULT, ?)";
					$cmd = $db->prepare($sql);
					$res = $cmd->execute(array($manu_des));
						if($res)
							echo json_encode(["msg" => "inserted"],JSON_PRETTY_PRINT);
						else
							echo "0";
				//}
			}
		}
	}
?>