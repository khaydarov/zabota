<?php
session_start();

include_once('../config.php');

$patient = $_POST['patient'];
$count = $_POST['count'];
$price = $_POST['price'];
$data = $_POST['data'];
$id_med = $_POST['id_med'];
$doctor = $_SESSION['uid'];
$period = $_POST['period'];

if ($patient != 0)
{
	$sql = "INSERT INTO expences(med_id, patient_id, doctor_id, count, price, data, period) 
					VALUES('$id_med', '$patient', '$doctor', '$count', '$price', '$data', '$period')";

	mysql_query($sql);

	$sql = "SELECT count FROM medicines WHERE id='$id_med'";
	$res = mysql_query($sql);
	$row = mysql_fetch_object($res);

	$medCount = $row->count;
	$newCount = $medCount - $count;

	$sql = "UPDATE medicines SET count='$newCount' WHERE id='$id_med'";
	mysql_query($sql);
}
else
{
	$sql = "SELECT * FROM patients";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	for($i = 0; $i < count($result); $i++)
	{
		$id = $result[$i]->id;
		$sql = "INSERT INTO expences(med_id, patient_id, doctor_id, count, price, data, period) 
					VALUES('$id_med', '$id', '$doctor', '$count', '$price', '$data', '$period')";

		mysql_query($sql);

		$sql = "SELECT count FROM medicines WHERE id='$id_med'";
		$res = mysql_query($sql);
		$row = mysql_fetch_object($res);

		$medCount = $row->count;
		$newCount = $medCount - $count;

		$sql = "UPDATE medicines SET count='$newCount' WHERE id='$id_med'";
		mysql_query($sql);
	}
}


?>