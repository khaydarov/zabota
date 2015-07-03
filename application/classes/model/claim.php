<?php

function getClaim($id) 
{
	if ($id == '1')
		$sql = "SELECT * FROM claim";
    else 
    	$sql = "SELECT * FROM claim JOIN sendto WHERE uid='$id' AND claim.id=sendto.cid AND claim.closed ='0'
    	   	                    ";

    $res = query($sql);
    while ($row = mysql_fetch_object($res))
    	$result[] = $row;

    return $result;
}

function getCountOfClaims($id) {
	$sql = "SELECT * FROM sendto WHERE uid='$id'";
    $res = query($sql);

    return mysql_num_rows($res);
}

function CountOfInput($id) {
	$sql ="SELECT * FROM sendto WHERE uid='$id' AND state='0'";
	$res = query($sql);

	return mysql_num_rows($res);
}

function CountOfOutput($id) {
	$sql = "SELECT * FROM sendto WHERE uid='$id' AND state='1'";
	$res = query($sql);

	return mysql_num_rows($res);
}

function getInputClaim($id) {
	$sql ="SELECT * FROM claim JOIN sendto WHERE uid='$id' AND claim.id=sendto.cid AND claim.closed ='0' AND sendto.state='0'
	                        ";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getOutputClaim($id) {
	$sql ="SELECT * FROM claim JOIN sendto WHERE uid='$id' AND claim.id=sendto.cid AND claim.closed ='0' AND sendto.state='1'
	            ";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}

function getClaimInfo($id)
{
	$sql = "SELECT * FROM claim WHERE id='$id'";
	$res = query($sql);

    $row = mysql_fetch_object($res);
    return $row;
}

function getDepName($id) {
	$sql = "SELECT * FROM department WHERE id='$id'";
	$res = query($sql);

	$row = mysql_fetch_object($res);
	$str = $row->name_ru.' / '.$row->name_tj;
	return $str;
}

function getSecName($id) {
	$sql = "SELECT * FROM section WHERE id='$id'";
	$res = query($sql);

	$row = mysql_fetch_object($res);
	$str = $row->name_ru.' / '.$row->name_tj;
	return $str;
}

function getTypeName($id) {
	$sql = "SELECT * FROM type WHERE id='$id'";
	$res = query($sql);

	$row = mysql_fetch_object($res);
	$str = $row->name_ru.' / '.$row->name_tj;
	return $str;
}

function makeopen($user, $cid) {
	$sql = "UPDATE sendto SET status='1' WHERE cid='$cid' AND uid='$user'";
	query($sql);
}

function makestate($user, $cid) {
	$sql ="UPDATE sendto SET state='1' WHERE cid='$cid' AND uid='$user'";
	query($sql);
}



function getSectionsFromDepartment($id)
{
	$sql = "SELECT * FROM section WHERE id_dep='$id'";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

    return $result;
}

function getUsersFromSection($id) {
	$sql = "SELECT * FROM users WHERE role='4' AND id_sec='$id'";
	$res = query($sql);
    
    while($row = mysql_fetch_object($res))
    	$result[] = $row;

    return $result;
}

function getManagerFromSection($id) {
	$sql = "SELECT * FROM users WHERE role='3' AND id_sec='$id'";
	$res = query($sql);
	$row = mysql_fetch_object($res);
	return $row;
}

function checkclosed($cid, $user) {
	$sql = "SELECT * FROM closed WHERE cid='$cid' AND uid='$user'";
	$res = query($sql);
	
	return mysql_num_rows($res);
}

function closeClaim($cid, $user, $file) {
	/*$sql = "UPDATE claim SET closed='1' WHERE id='$cid'";
	query($sql);*/
	
	$check = checkclosed($cid, $user);
	if ($check == 0) {
		$date = date('Y-m-d');
		$sql = "INSERT INTO closed(cid, uid, data, filename) VALUES('$cid', '$user', '$date', '$file')";
		query($sql);

		$sql = "UPDATE claim SET closed='1' WHERE id='$cid'";
		query($sql);

		$sql = "DELETE FROM sendto WHERE cid='$cid'";
	}
}

function getClosedClaim($id) {
	$sql = "SELECT * FROM claim JOIN closed, users WHERE 
			closed.cid=claim.id AND closed.uid=users.id AND users.id_dep='$id'";
	
	$res = query($sql);

	while($row = mysql_fetch_object($res))
        $result[] = $row;

    return $result;		
}

function getCountofClosed($id) {
	$sql ="SELECT * FROM closed JOIN users WHERE closed.uid=users.id AND id_dep='$id'";
	$res = query($sql);

	return mysql_num_rows($res);
}

function isClosed($id) {
	$sql = "SELECT * FROM claim WHERE closed='1' AND id='$id'";
	$res = query($sql);
    if (mysql_num_rows($res) > 0)
       return 1;
    else 
       return 0;
}

function CloseThisClaim($id) {
	$sql ="UPDATE claim SET confirm='1' WHERE id='$id'";
	query($sql);

    $sql = "UPDATE closed SET confirm='1' WHERE cid='$id'";
    query($sql);
    
	$sql = "DELETE FROM sendto WHERE cid='$id'";
	query($sql);
}


function getComments($id) {
	$sql = "SELECT * FROM comment WHERE cid='$id' ORDER BY id DESC";
	$res = query($sql);
	
	while($row = mysql_fetch_object($res))
		$result[] = $row;
		
	return $result;
}


function sendedto($cid, $by) {
	$sql = "SELECT * FROM sendto WHERE cid='$cid' AND bei='$by'";
	$res = query($sql);
	
	while($row = mysql_fetch_object($res))
		$result[] = $row;
	
	return $result;
}




