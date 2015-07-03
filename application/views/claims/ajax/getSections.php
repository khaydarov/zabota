<?php

$conn = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('dt', $conn);
mysql_query("SET NAMES utf8");

$id = $_POST['id'];

$sql = "SELECT * FROM section WHERE id_dep='$id'";
$res = mysql_query($sql);

while($row = mysql_fetch_object($res))
	$result[] = $row;

for($i = 0; $i < count($result); $i++) {
	$ids = $result[$i]->id;
	$html = $html."<option value='$ids'>".$result[$i]->name_ru.' / '.$result[$i]->name_tj.'</option>';
}

echo $html;
