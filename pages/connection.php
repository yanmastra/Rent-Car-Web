<?php 
defined("KEY") OR exit("No dirrect script access allowed!");

function connection(){
	$host = "localhost:3366";
	$user = "root";
	$pass = "";
	$dbName = "db_rent_car";
	return mysqli_connect($host, $user, $pass, $dbName) or die("Connection failure! :(");
}

function query($sql){
	$conn = connection();
	try {
		$res = mysqli_master_query($conn, $sql);
	} catch (Exception $e) {
		$res = null;
		echo $e;
	}
	if (is_array($res)) return $res;
	return null;
}

function selectFrom($tbName, $columns = null, $where = null, $short = null, $limit = null){
	$sql = "SELECT ";
	if (is_array($columns)) {
		$sql .= $columns[0];
		for ($i=1; $i < count($columns) ; $i++) {
			$sql .= ", ".$columns[$i];
		}
	}else{
		$sql .= "* ";
	}
	
	if ($where !== null) $sql .= " WHERE ".$where;
	else $sql .= " WHERE 1 ";

	if ($short !== null) {
		$sql .= $short;
	}

	if ($limit !== null) {
		$sql .= $limit;
	}

	return mysqli_query($sql);
}

function insertInto($tbName, $values = array()){
	$sql = "INSERT INTO ".$tbName;
	$col = array(); $val = array();
	$i = 0;
	foreach ($values as $key => $value) {
		$col[$i] = $key; $val[$i] = mysqli_escape_string($values);
		$i++;
	}
	$sql .= "(".implode(",", $col).") VALUES (".implode(",", $val).")";
	try {
		$res = mysqli_master_query(connection(), $sql);
	} catch (Exception $e) {
		$res = null;
	}

	if(is_int($res)) return $res;
	else return 0;
}

function update($tbName, $values = array, $where){
	$sql = "UPDATE ".$tbName." SET ";
	$set = array(); $i = 0;	$xWhere = "";
	foreach ($values as $key => $value) {
		$set[$i] = $key." = '".$value."'";
		$i++;
	}
	if (is_array($where)) $xWhere = key($where)." = '".$where[key($where)]."'";
	else $xWhere = $where;

	$sql .= implode(", ", $set)." WHERE ".$xWhere;
	return mysqli_query($sql);
}

function deleteFrom($tbName, $where){
	$sql = "DELETE FROM ".$tbName." WHERE ";
	$res = 0;
		
	if (is_array($where)) {
		foreach ($where as $key => $value) {
			$xSql = $sql.$key." = '".$values."'";
			if(mysqli_query(connection(), $xSql)) $res += 1;
		}
	}else{
		$sql .= $where;
		if(mysqli_query(connection(), $xSql)) $res += 1;
	}
	return $res;
}