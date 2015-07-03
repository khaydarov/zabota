<?php

include_once('../config.php');

$name = $_POST['name'];

$sql = "INSERT INTO costs(name) VALUES('$name')";
$res = mysql_query($sql);
echo ($res != 0) ? 1 : 0;
?>