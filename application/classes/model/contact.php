<?php

function getDepNameById($id)
{
	$sql = "SELECT name_ru, name_tj FROM department WHERE id='$id'";
	
	$res = mysql_query($sql);

	$row = mysql_fetch_object($res);

    return $row->name_ru;
}

function getSecNameById($id)
{

	$sql = "SELECT name_ru, name_tj FROM section WHERE id='$id'";
	$res = mysql_query($sql);

	$row = mysql_fetch_object($res);

	return $row->name_ru;
}

function getStateNameById($id)
{
	$sql = "SELECT name FROM state WHERE id='$id'";
	$res = mysql_query($sql);

	$row = mysql_fetch_object($res);

	return $row->name;
}

function getCityNameById($id)
{
	$sql = "SELECT name FROM city WHERE id='$id'";
	$res = mysql_query($sql);

	$row = mysql_fetch_object($res);

	return $row->name;
}

function getContactList() 
{
	
	$sql = "SELECT * FROM contacts";
	$res = mysql_query($sql);
   
    while($row = mysql_fetch_object($res)) {
    	$result[] = $row;

    }
    
	return $result;
}

function getContact($id) 
{
	//hone_contact.id_contact = contacts.id AND education_contact.id_contact = contacts.id AND address_contact.id_contact = contacts.id
    $sql = "SELECT * FROM contacts WHERE id='$id'";
    
    $res = mysql_query($sql);

    $row = mysql_fetch_object($res);

    return $row;
}

function getPhoneNumber($id) {

    $sql = "SELECT * FROM phone_contact WHERE id_contact='$id'";
    $res = query($sql);
    $row = mysql_fetch_object($res);

    return $row->phone;
}