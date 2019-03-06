<?php 
		function getData ($select_field,$table,$where_field,$value) {
		global $mysqli;
		connectDB();
		$result = $mysqli->query("SELECT $select_field FROM `$table` WHERE $where_field=$value");
		closeDB();
		return resultToArray($result);
	}
	
	function getProfileInfo ($profile_id) {
		global $mysqli;
		connectDB();
		$result = $mysqli->query("SELECT * FROM `users` WHERE id=$profile_id");
		closeDB();
		return resultToArray($result);
	}
	function checkIfExists($select_field, $table, $where_field, $value) {
		global $mysqli;
		connectDB();
		$result = $mysqli->query("SELECT $select_field FROM `$table` WHERE $where_field ='$value'");
		closeDB();	
		return resultToArray($result);
	}
?>