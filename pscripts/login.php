<?php
session_start();
require("../include/db/dbconnect.php");
include("../include/ifjson/isjson.php");
include("../include/sqlscripts/sqlscripts.php");
opendb();

if(isset($_POST) && !empty($_POST))
{
	$password=sha1(md5($_POST['password']."".strrev($_POST['password'])));
	$query = mysqli_query($db, "SELECT
									user.IBO_UserID as userID,
									user.IBO_UserName as userN,
									user.Access_Level as userALvl,
									user_detail.firstname as ufn,
									user_detail.lastname as uln
									FROM user
									LEFT JOIN user_detail on user.IBO_UserID=user_detail.IBO_UserID
									WHERE user.IBO_UserName ='".$_POST['username']."' 
									AND user.Pass_Phrase='".$password."'
									");
	$data = fetch_all_array($query)[0];
	if(count($data)!=0){
		$_SESSION['userID']=$data['userID'];
		$_SESSION['userN'] = $data['userN'];
		$_SESSION['userALvl'] = $data['userALvl'];
		$_SESSION['fn'] = $data['ufn'];
		$_SESSION['ln'] = $data['uln'];
		header("Location: /customer/customer");
	}else{
		header("Location: /?err=1"); 
	}
}else{
	header("Location: /"); 
}
closedb();
?>