<?php

include('../config.php');

$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];

$sql = "INSERT INTO chemists(name, address, contact) VALUES('$name', '$address', '$contact')";
$res = mysql_query($sql);

echo ($res != 0) ? 1 : 0;
?>