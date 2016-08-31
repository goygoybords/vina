<?php
	ini_set('memory_limit', '-1');

	require("../include/db/dbconnect.php");
	include("../include/ifjson/isjson.php");
	include("../include/sqlscripts/sqlscripts.php");

	// echo "test";

	function userexist($db, $username){
		$found = mysqli_query($db, "SELECT * FROM user WHERE IBO_UserName = '$username'");

		if(mysqli_num_rows($found) > 0) return true;
		return false;
	}
	function checkpassword($db, $username, $password){
		$found = mysqli_query($db, "SELECT * FROM user WHERE IBO_UserName = '$username' && Pass_Phrase = '$password'");
		if(mysqli_num_rows($found) > 0) return true;
		return false;
	}

	opendb();

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == '' )
			echo 'missing required fields';
			exit();
		if($password == '')
			echo 'missing required fields';
			exit();
		if(! userexist($db, $username))
			echo 'username not found';
			exit();

		if(checkpassword($db, $username, $password)){
			// header("Location: /customer/customer"); /* Redirect browser */
			header("Location: /"); /* Redirect browser */
			exit();
		}else{
			header("Location: login?error"); /* Redirect browser */
		}
	}else {
		// echo json_encode();
		header("Location: login?error");
	}

	closedb();

?>