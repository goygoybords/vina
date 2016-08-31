<?php 
set_time_limit(0);
ini_set('memory_limit', '-1');
	// fetch
	function fetch_all_array($sql)
	{
		$out = array();
		while ($row = mysqli_fetch_array($sql))
		{
			$out[] = $row;
		}
		return $out;
	}
	// update
	function query_update($db,$table='', $data=array(), $where='')
	{
		$q="UPDATE `".$table."` SET ";
		foreach($data as $key=>$val)
		{
			if(strtolower($val)=='null') $q.= "`$key` = NULL, ";

			elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";

			else $q.= "`$key`='".$val."', ";
		}
		$q = rtrim($q, ', ') . ' WHERE '.$where.';';
		$qu = mysqli_query($db,$q);
		return $qu;
	}
	// insert
	function query_insert( $db,$table, $data)
	{
		$q="INSERT INTO `".$table."` ";
		$v=''; $n='';

		foreach($data as $key=>$val)
		{
			$n.="`$key`, ";
			if(strtolower($val)=='null') $v.="NULL, ";
			elseif(strtolower($val)=='time()') $v.="time(), ";
			else $v.= "'".$val."', ";
		}

		$q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";

		if(mysqli_query($db, $q)){
			return mysqli_insert_id($db);
		}
		else return false;
	}
	// 
 ?>