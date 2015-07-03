<?php

$conn = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('dt', $conn);
mysql_query("SET NAMES utf-8");

$id = $_POST['id'];

$sql = "SELECT * FROM users WHERE id_dep='$id' AND (role='2' OR role='5')";
$res = mysql_query($sql);

while ($row = mysql_fetch_object($res))
	$result[] = $row;

for($i = 0; $i < count($result); $i++) {
	$uid = $result[$i]->lastname.' '.$result[$i]->name;
	$html = $html."<option value='$uid'>".$result[$i]->lastname.' '.$result[$i]->name."</option>";
}
echo $html;
?>