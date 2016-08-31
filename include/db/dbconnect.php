<?php

date_default_timezone_set('America/Chicago');

function opendb()

{

	global $db;

	$db=mysqli_connect("localhost","vinaouts_vdusr01","VDdb01!@#","vinaouts_vddb01");

	if(mysqli_connect_errno()) echo 'Failed to connect to MySQL: ' . mysqli_connect_error();

}



function closedb()

{

	global $db;

	mysqli_close($db);

}

?>



