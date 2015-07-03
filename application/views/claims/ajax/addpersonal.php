<?php

include('config.php');

	
	$username = $_POST['username'];
	$education = $_POST['education'];
	$position = $_POST['position'];
	$phone = $_POST['phone'];
	$access = $_POST['access'];
	$end_access = $_POST['end_access'];
	$end_certificate = $_POST['end_certificate'];
	$contract = $_POST['contract'];
	$inn = $_POST['inn'];
	$snils = $_POST['snils'];
	$role = $_POST['role'];

$sql = "INSERT INTO personal(username, education, position, phone, access, end_access, end_certificate, contract_num, inn, snils, role) 
				VALUES ('$username', '$education', '$position', '$phone', '$access', '$end_access', '$end_certificate', '$contract', '$inn', '$snils', '$role')";

$res = mysql_query($sql);

echo ($res) ? 1 : 0;

?>