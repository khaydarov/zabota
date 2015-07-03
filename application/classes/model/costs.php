<?php

function getAllCosts() {
	$sql = "SELECT * FROM costs";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getCostNameById($id) {
	$sql = "SELECT name FROM costs WHERE id='$id'";
	$res = mysql_query($sql);

	$row = mysql_fetch_object($res);
	return $row->name;
}

function CIncomings($id) {
	$sql = "SELECT * FROM cincomings WHERE id_cost='$id' ORDER BY id DESC";
	$res = mysql_query($sql);
	
	while($row = mysql_fetch_object($res)) 
		$result[] = $row;

	return $result;
}

function CExpences($id) {
	$sql = "SELECT * FROM cexpences WHERE id_cost = '$id' ORDER BY id DESC";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getCostIncomingsFromDate($id, $month, $year) {
	$sql = "SELECT * FROM cincomings WHERE data LIKE '%.$month.20$year' AND id_cost = '$id'";	
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getCostExpencesFromDate($id, $month, $year) {
	$sql = "SELECT * FROM cexpences WHERE data LIKE '%.$month.20$year' AND id_cost = '$id'";	
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}