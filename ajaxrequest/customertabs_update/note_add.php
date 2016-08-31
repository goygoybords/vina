<?php 

	ini_set('memory_limit', '-1');

	set_include_path('../../include');

	require("db/dbconnect.php");

	require("sqlscripts/sqlscripts.php");

	$unixtime=time();

	opendb();



		if(isset($_POST))

		{

				

				$data['Type'] = mysqli_real_escape_string($db,$_POST['type']);

				$data['Note_Subj'] = mysqli_real_escape_string($db,$_POST['subj']);

				$data['Note_Text'] = mysqli_real_escape_string($db,$_POST['note']);

				$data['IBO_UserID'] = mysqli_real_escape_string($db,$_POST['userid']);

				$data['Customer_ID'] = mysqli_real_escape_string($db,$_POST['cust_id']);

		        $data['Review_Date'] = $unixtime;

				$success = query_insert($db,"customer_note",$data);

		       

		        echo $success;

				



			

		}



	closedb();

 ?>