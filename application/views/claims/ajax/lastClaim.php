<?php

$conn = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('dt', $conn);

$id = $_POST['id'];

$sql = "SELECT id FROM claim ORDER BY id DESC LIMIT 1";
$res = mysql_query($sql);

$row = mysql_fetch_object($res);

$ans = $row->id + 1;
echo $ans;
?>