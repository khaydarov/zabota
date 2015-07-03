<?php

include('config.php');

$date = $_POST['date'];
$id = $_POST['id'];

$sql = "UPDATE personal SET end_access='$date' WHERE id='$id'";
mysql_query($sql);

return 1;
?>