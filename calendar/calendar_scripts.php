<?php 

	function getEvents()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT c.*, cu.Last_Name, cu.First_Name, u.IBO_UserName	
				FROM calendar_events c
				JOIN customers cu
				ON  c.CustomerID = cu.CustomerID
				JOIN user u
				ON c.user_id = u.IBOUID
				WHERE c.status = 1 ORDER BY 1 DESC";
		$cmd = $db->query($sql);
		$events = $cmd->fetchAll();

		return $events;

	}
	function getCustomer($cusid)
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT First_Name, Last_Name FROM customers WHERE CustomerID = ? ";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($cusid));
	   	$result = $cmd->fetch();
		return $result;
	}

	function getUsers()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT IBOUID, IBO_UserName	 FROM user ";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($cusid));
	   	$result = $cmd->fetchAll();
		return $result;

	}
	function getSpecificEvent($id)
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT c.*, cu.Last_Name, cu.First_Name, u.IBO_UserName	
				FROM calendar_events c
				JOIN customers cu
				ON  c.CustomerID = cu.CustomerID
				JOIN user u
				ON c.user_id = u.IBOUID
				WHERE c.id = ? and c.status = 1";
		$cmd = $db->prepare($sql);
		$cmd->execute(array($id));
		$events = $cmd->fetch();

		return $events;

	}

	

?>