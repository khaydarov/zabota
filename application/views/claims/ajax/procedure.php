<?php

include_once('config.php');


$id_patient = $_POST['id_patient'];
$id_doctor = $_POST['id_doctor'];
$id_procedure = $_POST['id_procedure'];
$id_place = $_POST['id_place'];
$data = $_POST['data'];
$start = $_POST['start'];
$end = $_POST['end'];

$sql = "INSERT INTO schedule(id_patient, id_doctor, id_procedure, id_place, data, start_time, finish_time)
					VALUES('$id_patient', '$id_doctor', '$id_procedure', '$id_place', '$data', '$start', '$end')";

mysql_query($sql);
//echo $sql;

?>