<?php


function getSchedule($data) {
	$sql = "SELECT * FROM schedule WHERE data = '$data' ORDER BY start_time DESC";
	$res = mysql_query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}