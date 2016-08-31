<?php		
	function getStatusCustomer()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT * FROM status_customer ORDER BY 1 DESC";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();

		return $result;
	}	

	function getStatusSource()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT * FROM status_source ORDER BY 1 DESC";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();

		return $result;
	}

	function getStatusCarriers()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT * FROM carriers ORDER BY 1 DESC";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();

		return $result;

	}

	function getStatusManufacturer()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT * FROM mfg_vehicle ORDER BY 1 DESC";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();
		return $result;
	}
	function getStatusViolation()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT * FROM auto_violation ORDER BY 1 DESC";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();
		return $result;		
	}

	function getStatusPolicy()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT * FROM policy ORDER BY 1 DESC";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();
		return $result;	

	}


?>