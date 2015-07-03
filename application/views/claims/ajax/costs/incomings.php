<?php

include('../config.php');


$id_cost = $_POST['id_cost'];
$count = $_POST['count'];
$consigment = $_POST['consigment'];
$data = $_POST['data'];
$price = $_POST['price'];

$sql = "INSERT INTO cincomings(id_cost, count, consigment, data, price)
					VALUES('$id_cost', '$count', '$consigment', '$data', '$price')";
$res = mysql_query($sql);


/* =============== COUNT  ============== */ 
	$sql = "SELECT count FROM cincomings WHERE id_cost='$id_cost'";
	$res = mysql_query($sql);

	$result = 0;

	while ($row = mysql_fetch_object($res)) {
		$result += $row->count;
	}

	$sql = "UPDATE costs SET count='$result' WHERE id='$id_cost'";
	mysql_query($sql);
?>