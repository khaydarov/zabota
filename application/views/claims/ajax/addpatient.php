<?php

include('config.php');


foreach($_POST as $key=>$val) {
	$$key = $val;
    $items[] = $key;
	$values[] = $val;
}
for($i = 0; $i < count($items); $i++) {
	if ($i == count($items) - 1)
	{
		$t = $t.$items[$i];
		$v = $v."'".$values[$i]."'";
	}
	else {
		$t = $t.$items[$i].',';
		$v = $v."'".$values[$i]."'".',';
	}
}

$sql = "INSERT INTO patients(".$t.") VALUES(".$v.")";
$res = mysql_query($sql);

//echo ($res) ? 1 : 0;
echo $sql;
?>