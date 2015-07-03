<?php


$conn = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('dt', $conn);

$id = $_POST['id'];

$sql = "SELECT * FROM sendto WHERE uid='$id'";
$res = mysql_query($sql);

echo mysql_num_rows($res);
?>