<?php
session_start();

include('../config.php');

$id = $_POST['id'];
$count = $_POST['count'];
$price = $_POST['price'];
$date = $_POST['nazdata'];
$patient = $_POST['patient_id'];
$doctor = $_SESSION['uid'];

$sql = "INSERT INTO cexpences(id_cost, id_patient, id_doctor, count, price, data) 
					VALUES('$id', '$patient', '$doctor', '$count', '$price', '$date')";

$res = mysql_query($sql);


$sql = "SELECT count FROM costs WHERE id='$id'";
$res = mysql_query($sql);
$row = mysql_fetch_object($res);

$medCount = $row->count;
$newCount = $medCount - $count;

$sql = "UPDATE costs SET count='$newCount' WHERE id='$id'";
mysql_query($sql);


echo $id;


?>