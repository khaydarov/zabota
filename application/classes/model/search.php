<?php

function findByInNum($txt) {
	$sql = "SELECT * FROM claim";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
	{
		if (strpos($row->in_num, $txt) !== false)
			$result[] = $row;
	}

	return $result;
}

function findByOutNum($txt) {
	$sql = "SELECT * FROM claim";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
	{
		if (strpos($row->out_num, $txt) !== false)
			$result[] = $row;
	}

	return $result;
}

function findBySenname($txt) {
	$sql = "SELECT * FROM claim";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
	{
		if (strpos($row->sen_name, $txt) !== false)
			$result[] = $row;
	}

	return $result;
}

function findByDate($txt) {
	$sql = "SELECT * FROM claim";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
	{
		if (strpos($row->out_date, $txt) !== false)
			$result[] = $row;
	}

	return $result;
}

function findByContactName($txt) {
	$sql = "SELECT * FROM contacts";
	$res = query($sql);
	while($row = mysql_fetch_object($res))
	{
		if (strpos(strtolower($row->lastname), strtolower($txt)) !== false)
			$result[] = $row;
	}

	return $result;
}

function findByContactNumber($txt) {
	$sql = "SELECT * FROM contacts";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
	{
		if (strpos($row->in_t, $txt) !== false || strpos($row->out_t, $txt) !== false)
			$result[] = $row;
	}

	return $result;
}