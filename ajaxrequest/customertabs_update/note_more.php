<?php 

	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");

	$unixtime=time();
	opendb();
		if(isset($_POST['more']))
		{

			$noteid = $_POST['noteid'];
			$qnotesM = mysqli_query($db,"SELECT Note_Text,Note_ID
										FROM customer_note
										WHERE Note_ID='".$noteid."'
										");
			if($_POST['more']=="more")
			{
				$more = 1;
			}else{
				$more = 0;
			}
			$getNotesM = mysqli_fetch_assoc($qnotesM);
			echo json_encode(["note" => $getNotesM['Note_Text'],"id" => $getNotesM['Note_ID'], "opt" => $more]);
		}
			
	closedb();
?>