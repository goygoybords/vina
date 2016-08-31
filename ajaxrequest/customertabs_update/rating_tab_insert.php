<?php
	if(isset($_POST))
	{
		extract($_POST);
		$fdate = date("Y-m-d" , strtotime($fdate));  
		$fdate = strtotime($fdate);
		$review_date =  strtotime(date('Y-m-d'));
		$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "INSERT into customer_rating values (DEFAULT, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";			
		$cmd = $db->prepare($sql);
		$res = $cmd->execute(array($customer,$assign,$score,$grade,$fdate,0,0,0,0,$lname,$fname,$survey,$review_date,'' , 1));
		$last = $db->lastInsertId();
		if(count($question) != 0)
		{
			for($i=0; $i <count($question); $i++)
			{
				$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
				$sql = "INSERT into customer_rating_detail values (DEFAULT, ? , ?) ";			
				$cmd = $db->prepare($sql);
				$res = $cmd->execute(array($last, $question[$i]));
			}
		}
		echo $res;
	}
	
	
?>

