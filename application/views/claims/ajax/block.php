<?php

include('config.php');

$id = $_POST['id'];
$today = date('d.m.y');

mysql_query("UPDATE personal SET end_access='$today' WHERE id='$id'");
return 1;
?>