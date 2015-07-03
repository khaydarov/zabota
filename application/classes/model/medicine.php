<?php


function getAllmedicines() {
	$sql = "SELECT * FROM medicines";
	$res = mysql_query($sql);

	while ($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}


function getMedicineNameById($id) {
	
	$sql = "SELECT name FROM medicines WHERE id='$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_object($res);

	return $row->name;
}

function Incomings($id) {
	$sql = "SELECT * FROM incoming WHERE id_medicine='$id' ORDER BY id DESC";
	$res = mysql_query($sql);
	
	while($row = mysql_fetch_object($res)) 
		$result[] = $row;

	return $result;
}

function sumOfIncomings($id) {
	$sql = "SELECT count incomings WHERE id_medicine='$id'";
	$res = mysql_query($res);

	$result = 0;

	while ($row = mysql_fetch_object($res)) {
		$result += $row->count;
	}

	$sql = "UPDATE medicines SET count='$result' WHERE id='$id'";
	mysql_query($sql);
}

function getIncomingsFromDate($id, $month, $year) {
	$sql = "SELECT * FROM incoming WHERE data LIKE '%.$month.20$year' AND id_medicine = '$id'";	
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getExpencesFromDate($id, $month, $year) {
	$sql = "SELECT * FROM expences WHERE data LIKE '%.$month.20$year' AND med_id = '$id'";	
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}


function getChems() {
	$sql = "SELECT * FROM chemists";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}


function Expences($id) {

	$sql = "SELECT * FROM expences WHERE med_id='$id' ORDER BY id DESC";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

?>