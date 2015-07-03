<?php

function getAllpatients() {
	$sql = "SELECT * FROM patients";
	$res = query($sql);
	
	while($row = mysql_fetch_object($res)) {
    	$result[] = $row;

    }
    
	return $result;
}

function getPatientInfoById($id) {
	$sql = "SELECT * FROM patients WHERE id='$id'";
	$res = query($sql);
	$result = mysql_fetch_object($res);
	
	return $result;
}

function getPatientExpences($id, $month, $year) {

	if ($month != '00') {
		$sql = "SELECT * FROM expences WHERE data LIKE '%.$month.20$year' AND patient_id = '$id'";	
		$res = mysql_query($sql);
	}
	else {
		$sql = "SELECT * FROM expences WHERE patient_id = '$id'";
		$res = mysql_query($sql);
	}

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getPatientCostExpences($id, $month, $year) {

	if ($month != '00') {
		$sql = "SELECT * FROM cexpences WHERE data LIKE '%.$month.20$year' AND id_patient = '$id'";	
		$res = mysql_query($sql);
	}
	else {
		$sql = "SELECT * FROM cexpences WHERE id_patient = '$id'";
		$res = mysql_query($sql);
	}

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}