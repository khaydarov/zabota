<?php

include('config.php');

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "UPDATE category SET name='$name' WHERE id='$id'";
$res = mysql_query($sql);

return ($res) ? 1 : 0;
?>