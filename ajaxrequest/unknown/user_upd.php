<?php 
	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();

		if(isset($_POST))
		{
				$uid = $_POST['u'];	
				 
				 $data['IBO_UserName'] = mysqli_real_escape_string($db,$_POST['uname']);
				 $data['Access_Level'] = mysqli_real_escape_string($db,$_POST['access']);
				 $numbs = substr(str_shuffle(str_repeat("0123456789", 3)), 0, 3); //$rescid['latest']+100001;
			     $text = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 1)), 0, 1);
				if($uid!="")
				{
					if($_POST['pword']!='')
					 {
					 	$password=sha1(md5($_POST['pword']."".strrev($_POST['pword'])));
					 	$data['Pass_Phrase'] = $password;
					 }
					

					$u = query_update($db, "user",$data, "IBO_UserID='".$uid."'");
					$q = mysqli_query($db, "SELECT IBO_UserID FROM user_detail WHERE IBO_UserID='".$uid."' ");
					$getQ = fetch_all_array($q);
					if(count($getQ)!=0)
					{
						$dataAC['dateupdated'] = $unixtime;
						$dataAC['firstname'] = mysqli_real_escape_string($db,$_POST['fname']);
					 	$dataAC['lastname'] = mysqli_real_escape_string($db,$_POST['lname']);
						$ud = query_update($db, "user_detail",$dataAC, "IBO_UserID='".$uid."'");
					}else{
						$dataAC['datecreated'] = $unixtime;
						$dataAC['firstname'] = mysqli_real_escape_string($db,$_POST['fname']);
					 	$dataAC['lastname'] = mysqli_real_escape_string($db,$_POST['lname']);
						$dataAC['IBO_UserID'] = $uid;
						$ud = query_insert($db,"user_detail",$dataAC);
					}
					

					echo "update USER-".$u." DE-".$ud;

				}else{
					
					$data['Pass_Phrase'] = $password=sha1(md5($_POST['pword']."".strrev($_POST['pword'])));
					$dataAC['datecreated'] = $unixtime;
					$dataAC['firstname'] = mysqli_real_escape_string($db,$_POST['fname']);
				 	$dataAC['lastname'] = mysqli_real_escape_string($db,$_POST['lname']);
				 	$dataAC['IBO_UserID'] = $text.$numbs;
			        $data['IBO_UserID'] = $text.$numbs;

					$u = query_insert($db,"user",$data);
					$ud = query_insert($db,"user_detail",$dataAC);
			       
			        echo "insert USER-".$u." DE-".$ud;
				}

			
		}

	closedb();
 ?>