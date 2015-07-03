<?php

include_once('config.php');

$list = explode(',', $_POST['patList']);
$id_procedure = $_POST['id_procedure'];
$id_place = $_POST['id_place'];
$personalId = $_POST['personalId'];
$proc_date = $_POST['proc_date'];
$start = $_POST['start'];
$end = $_POST['end'];


$data = date('d.m.20y');

$sql = "INSERT INTO groups(id_personal, data) VALUES('$personalId', '$data')";
mysql_query($sql);

$sql = "SELECT * FROM groups ORDER BY id DESC";
$res = mysql_query($sql);
$row = mysql_fetch_object($res);

$id = $row->id;

for($i = 0; $i < count($list); $i++)
{
	$sql = "INSERT INTO groupofpatients(id_patient, id_group)
					VALUES('$list[$i]', '$id')";

	mysql_query($sql);
}

$sql = "INSERT INTO schedule(id_patient, id_doctor, id_procedure, id_place, data, start_time, finish_time)
				VALUES('group$id', '$personalId', '$id_procedure', '$id_place', '$proc_date', '$start', '$end')";

mysql_query($sql);

?>