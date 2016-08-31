<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();

		if(isset($_POST))
		{
				
			$uid = $_POST['uid'];
			$q = mysqli_query($db," SELECT user.IBO_UserName as unme,
										user.IBO_UserID as uid,
										user.Access_Level as ulvl,
										user_detail.firstname as fn,
										user_detail.lastname as ln 
										FROM user 
										LEFT JOIN user_detail on user.IBO_UserID=user_detail.IBO_UserID 
										WHERE user.IBO_UserID='".$uid."' ");
			$getQ = fetch_all_array($q)[0];

			echo json_encode($getQ);
		}

	closedb();
 ?>