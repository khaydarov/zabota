<?php

$conn = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('dt', $conn);

$id = $_POST['id'];

$sql = "SELECT code FROM type WHERE id='$id'";
$res = mysql_query($sql);

$row = mysql_fetch_object($res);

echo $row->code;
?>