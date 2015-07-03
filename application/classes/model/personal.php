<?php

function getAllpersonals() {
	$sql = "SELECT * FROM personal WHERE role='0'";
	$res = query($sql);
	
	while($row = mysql_fetch_object($res)) {
    	$result[] = $row;

    }
    
	return $result;
}

function getPersonalInfoById($id) {
	$sql = "SELECT * FROM personal WHERE id='$id'";
	$res = query($sql);
	$result = mysql_fetch_object($res);
	
	return $result;
}

function leftTime($date) {

	$m[1] = 31;
	$m[2] = 28;
	$m[3] = 31;
	$m[4] = 30;
	$m[5] = 31;
	$m[6] = 30;
	$m[7] = 31;
	$m[8] = 30;
	$m[9] = 31;
	$m[10] = 31;
	$m[11] = 30;
	$m[12] = 31;

	for($i = 1; $i <= 12; $i++)
		$ms[$i] = $ms[$i - 1] + $m[$i];


	$today = date('d.m.y');

	$todays_date = explode('.', $today);
	$registered_date = explode('.', $date);

	$day = $todays_date[0];
	$day1 = $registered_date[0];

	$month = $todays_date[1];
	$month1 = $registered_date[1];

	if ($month == $month1 && $day1 > $day) {
		return $day1 - $day;
	}
	else 
	{
		
		$month = (int) $month;
		$month1 = (int) $month1; 

		$days = $ms[$month1] - $ms[$month];

		return $days + $day1 - $day;
	}
}

function koldays($days) {
	if ($days == 1)
		return "день";
	if ($days == 2 || $days == 3 || $days == 4)
		return "дня";
	else 
		return "дней";
}