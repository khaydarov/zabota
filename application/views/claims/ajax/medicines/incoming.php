<?php

include('../config.php');


$id_med = $_POST['id_med'];
$count = $_POST['count'];
$consigment = $_POST['consigment'];
$data = $_POST['data'];
$price = $_POST['price'];

$sql = "INSERT INTO incoming(id_medicine, count, consigment, data, price)
					VALUES('$id_med', '$count', '$consigment', '$data', '$price')";
$res = mysql_query($sql);


/* =============== COUNT  ============== */ 
	$sql = "SELECT count FROM incoming WHERE id_medicine='$id_med'";
	$res = mysql_query($sql);

	$result = 0;

	while ($row = mysql_fetch_object($res)) {
		$result += $row->count;
	}

	$sql = "UPDATE medicines SET count='$result' WHERE id='$id_med'";
	mysql_query($sql);
?>