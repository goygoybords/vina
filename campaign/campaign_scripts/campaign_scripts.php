<?php 

	function connectDb()
	{
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		return $db;
	}
	function getCampaignDetails()
	{
		$db = connectDb();
		$sql = "SELECT c.*,  ct.description , cp.Company
				FROM campaign c
				JOIN carriers cp
				ON c.provider = cp.id
				JOIN campaign_type ct
				ON c.campaign_type = ct.id
				WHERE c.active = 1
				";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();
		return $result;
	}	
	function getCampaignType()
	{
		$db = connectDb();
		$sql = "SELECT * FROM campaign_type WHERE status = 1";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();
		return $result;
	}
	function getCampaignProviders()
	{
		$db = connectDb();
		$sql = "SELECT * FROM carriers";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();
		return $result;
	}


?>