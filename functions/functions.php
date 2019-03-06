<?php

	require_once "connect.php";
	require_once "select.php";
	
	function resultToArray($result) {
		$array = array();
		while(($row = $result->fetch_assoc())!=false)
			$array[] = $row;
		return $array;
	}
	function insertUserData($email, $password, $name) {
		global $mysqli;
		connectDB();
		$result = $mysqli->query("INSERT INTO `hudo_db`.`users` (`email`, `password`, `name`) VALUES ('$email', '$password', '$name')");
		closeDB();	
		return $result;		
	}
	function insertData($table, $fields, $values) {
		global $mysqli;
		connectDB();
		//$result = $mysqli->query("INSERT INTO `rp_db`.`$table` ($field_one, $field_two, $field_three) VALUES ($value_one, $value_two, $value_three)");
		$result = $mysqli->query("INSERT INTO `hudo_db`.`$table` ($fields) VALUES ($values)");
		closeDB();	
		return $result;		
	}
	function deleteData($table, $where_fields) {
		global $mysqli;
		connectDB();
		$result = $mysqli->query("DELETE FROM `rp_db`.`$table` WHERE $where_fields");
		closeDB();	
		return $result;		
	}
	
	function updateData($db_name,$table,$set_field,$new_data,$where_field,$value){
		global $mysqli;
		connectDB();
		$result = $mysqli->query("UPDATE  `$db_name`.`$table` SET  $set_field =  $new_data WHERE  $where_field =$value");
		//$result = $mysqli->query("UPDATE  `$db_name`.`$table` SET  `$set_field` =  '$new_data' WHERE  `$where_field` ='$value'");
		//"UPDATE  `$db_name`.`$table` SET  $set_field =  $new_data WHERE  $where_field =$value"
		closeDB();	
		return $result;	
	}
	function getProfileID(){
		session_start();
		$profile_id = $_SESSION['profile_id'];
		return $profile_id;
	}

?>