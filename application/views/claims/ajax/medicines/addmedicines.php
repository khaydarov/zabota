<?php

include('../config.php');

	$name = $_POST['name'];
	$cat = $_POST['cat'];

$sql = "INSERT INTO medicines(name, category) VALUES('$name', '$cat')";
$res = mysql_query($sql);

echo ($res != 0) ? 1 : 0;
?>