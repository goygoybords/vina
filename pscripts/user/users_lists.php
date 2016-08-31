<?php
	ini_set('memory_limit', '-1');
	include("sqlscripts/sqlscripts.php");
	function user_list($db)
	{
		$q = mysqli_query($db,"SELECT *,user.IBO_UserID as uid FROM user LEFT JOIN user_detail ON user.IBO_UserID=user_detail.IBO_UserID ORDER BY user.IBOUID DESC");
		$getQ = fetch_all_array($q);
		return $getQ;
	}
?>