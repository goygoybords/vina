<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();

		if(isset($_POST))
		{
				
				 $data['NAIC'] 	 		 = mysqli_real_escape_string($db,$_POST['carr']);
				 $data['Policy_Code'] 	 = mysqli_real_escape_string($db,$_POST['polType']);
				 $data['QStatus_ID'] 	 = mysqli_real_escape_string($db,$_POST['qstatus']);
				 $data['IBO_UserID'] 	 = mysqli_real_escape_string($db,$_POST['producer']);
				 $data['Quote'] 	 	 = mysqli_real_escape_string($db,$_POST['premium']);
				 $data['QuoteDate'] 	 = strtotime($_POST['qdate']);
				 $data['Bind'] 	 		 = strtotime($_POST['bindate']);
				 $data['Effective'] 	 = strtotime($_POST['effdate']);
				 $data['Note'] 	 	 	 = $_POST['note'];
			
// 				if($_POST['qouteU']==""){ 
// 						$numbs = substr(str_shuffle(str_repeat("0123456789", 7)), 0, 7); //$rescid['latest']+100001;
// 			        $text = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 2)), 0, 2);
// 			        $data['Review_Date'] = $unixtime;
// 			        $data['Quote_ID'] = $text.$numbs;
// 			        $data['Customer_ID'] = $_POST['c_id'];
// 			        $data['CustomerID'] = $_POST['cid'];
// 							//$success = query_insert($db,"customer_quote",$data);
			       
// 			        //echo $success."--"."insert";
// 							//echo $_POST['c_id'];
// 				}		

				if($_POST['qouteU']>0 OR $_POST['qouteU']!="")
				{
			    $id = $_POST['qouteU'];
					$success = query_update($db, "customer_quote",$data, "Quote_ID='".$id."'");
					echo $success."--"."update";

				}else{
					$numbs = substr(str_shuffle(str_repeat("0123456789", 7)), 0, 7); //$rescid['latest']+100001;
			        $text = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 2)), 0, 2);
			        $data['Review_Date'] = $unixtime;
			        $data['Quote_ID'] = $text.$numbs;
			        $data['Customer_ID'] = $_POST['c_id'];
			        $data['CustomerID'] = $_POST['cid'];
					$success = query_insert($db,"customer_quote",$data);
			       
			        echo $success."--"."insert";
				}

			
		}

	closedb();
 ?>