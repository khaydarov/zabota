<?php
session_start();

include('../config.php');

$id = $_POST['id'];
$count = $_POST['count'];
$price = $_POST['price'];
$date = $_POST['nazdata'];
$patient = $_POST['patient_id'];
$doctor = $_SESSION['uid'];
$period = $_POST['period'];

$sql = "INSERT INTO expences(med_id, patient_id, doctor_id, count, price, data, period) 
					VALUES('$id', '$patient', '$doctor', '$count', '$price', '$date', '$period')";

$res = mysql_query($sql);


$sql = "SELECT count FROM medicines WHERE id='$id'";
$res = mysql_query($sql);
$row = mysql_fetch_object($res);

$medCount = $row->count;
$newCount = $medCount - $count;

$sql = "UPDATE medicines SET count='$newCount' WHERE id='$id'";
mysql_query($sql);


?>