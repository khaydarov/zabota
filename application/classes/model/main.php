<?php

function getlastclaim() {
    $sql = "SELECT id FROM claim ORDER BY id DESC LIMIT 1";
    $res = mysql_query($sql);
    $row = mysql_fetch_object($res);

    return $row->id;
}

function sendemail($email) {
	$to      =  $email;
	$subject = 'Notification';
	$message = 'Вам отправили заяву пожалуйста перейдите по ссылке чтоб ее посмотреть'.
			 	"<a href='http://192.168.0.105/dt/'>"." Сюда</a>";

	$headers = 'From: robot@orienbank.com' . "\r\n" .
		'Content-type: text/html; charset=utf-8' . "\r\n";

	mail($to, $subject, $message, $headers);
}

function getEmailByUserId($id) {
	$sql = "SELECT email FROM users WHERE id='$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_object($res);

	return $row->email;
}

function checkquery($user, $claim) {
	$sql = "SELECT * FROM sendto WHERE uid='$user' AND cid='$claim'";
	$res = query($sql);
	
	return mysql_num_rows($res);
}
function sendtouser($user, $claim, $by)
{
    $sql = "INSERT INTO sendto(uid, cid, bei) VALUES('$user', '$claim', '$by')";
	$check = checkquery($user, $claim);
	if ($check == 0) {
		$res = query($sql);
		$email = getEmailByUserId($user);
		sendemail($email);
	}
}

function addClaim($in_num, $in_date, $type, $description, $sen_dep, $sen_name, $out_num, $out_date, $filename, $user) 
{
    //$sql = "INSERT INTO claim(in_num, in_date, type, description, sen_dep, sen_sec, sen_name, out_num, out_date, filename)
      //              VALUES('$in_num', '$in_date', '$type', '$description', '$sen_dep', '$sen_sec', '$sen_name', '$out_num', '$out_date', '$filename')";
    $sql = "INSERT INTO  `dt`.`claim` (
										`in_num` ,
										`in_date` ,
										`out_num` ,
										`out_date` ,
										`type` ,
										`description` ,
										`sen_dep` ,
										`sen_name` ,
										`filename`
									) VALUES ('$in_num',  '$in_date',  '$type',  '$description',  '$sen_dep',  '$sen_name',  '$out_num',  '$out_date',  '$filename');";
    query($sql);

    $claim = getlastclaim();
    
    sendtouser($user, $claim, 0);
}

function getTypes($id = null) 
{
	if ($id == null)
		$sql = "SELECT * FROM type";
	else 
		$sql = "SELECT * FROM type WHERE id='$id'";

	$res = query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
	
}

function getDepartments($id = null) 
{
	if ($id == null)
		$sql = "SELECT * FROM department";
	else 
		$sql = "SELECT * FROM department WHERE id='$id'";

    $res = query($sql);

    while($row = mysql_fetch_object($res))
    	$result[] = $row;

    return $result;
}

function getDirector2s($id) {
	$sql = "SELECT * FROM users WHERE role='5' AND id_dep='$id'";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getFileNameByCid($id) {
	$sql = "SELECT filename FROM claim WHERE id='$id'";
	$res = query($sql);
	$row = mysql_fetch_object($res);
	
	return $row->filename;
}

function getActByCid($id) {
	$sql = "SELECT filename FROM closed WHERE cid='$id'";
	$res = query($sql);
	$row = mysql_fetch_object($res);
	
	return $row->filename;
}

function addcomment($uid, $cid, $user, $text) 
{
	$sql = "INSERT INTO comment(uid, cid, touser, comment)
						VALUES('$uid', '$cid', '$user', '$text')";
	
	query($sql);
	
}

function getUserName($id) {
	$sql = "SELECT * FROM personal WHERE id='$id'";
	$res = query($sql);
	$row = mysql_fetch_object($res);
	
	return $row->username;
}

function getUserInfo($id) {
	$sql = "SELECT * FROM users WHERE id='$id'";
	$res = query($sql);

    $row = mysql_fetch_object($res);

    return $row;
}


