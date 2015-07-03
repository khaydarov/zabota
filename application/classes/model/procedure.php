<?php

function getAllProcedures(){
	$sql = "SELECT * FROM procedures";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getAllPlaces() {
	$sql = "SELECT * FROM place";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getScheduleOfPatient($id) {
	$sql = "SELECT * FROM schedule WHERE id_patient = '$id' ORDER BY id DESC";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getScheduleOfDoctor($id) {
	$sql = "SELECT * FROM schedule WHERE id_doctor = '$id' ORDER BY id DESC";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getProcedureNameById($id) {
	$sql = "SELECT * FROM procedures WHERE id = '$id'";
	$res = mysql_query($sql);

	$row = mysql_fetch_object($res);

	return $row->name;
}

function getPlaceNameById($id) {
	$sql = "SELECT * FROM place WHERE id = '$id'";
	$res = mysql_query($sql);

	$row = mysql_fetch_object($res);

	return $row->name;
}

function getPersonalNameById($id) {
	$sql = "SELECT * FROM personal WHERE id = '$id'";
	$res = mysql_query($sql);

	$row = mysql_fetch_object($res);

	return $row->username;
}