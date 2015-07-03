<?php

$conn = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('dt', $conn);


if (isset($_POST['id'])) {
$id = $_POST['id'];

$sql = "SELECT * FROM section WHERE id_dep='$id'";
$res = mysql_query($sql);

while($row = mysql_fetch_object($res))
$result[] = $row;

for($i = 0; $i < count($result); $i++) {
	$id = $result[$i]->id;
   $html = $html."<option value='$id'>".$result[$i]->name_ru.' / '.$result[$i]->name_tj."</option>";
}

echo $html;
}

if (isset($_POST['state'])) {

$id = $_POST['state'];

$sql = "SELECT * FROM city WHERE id_state='$id'";
$res = mysql_query($sql);

while($row = mysql_fetch_object($res))
$result[] = $row;

for($i = 0; $i < count($result); $i++) {
	$id = $result[$i]->id;
   $html = $html."<option value='$id'>".$result[$i]->name."</option>";
}

echo $html;
}

?>