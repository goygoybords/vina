<?php 
function isJson($string) {
 	json_decode($string);
 // 	if (json_last_error() === 0) {
 //    	return true;
	// }else{
	// 	return false;
	// }
	return json_decode($string);
}
 ?>