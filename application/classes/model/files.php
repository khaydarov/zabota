<?php

function addcategory($id_user, $name) {
	$sql = "INSERT INTO category(id_user, name)
						VALUES('$id_user', '$name')";

    $res = query($sql);

    return ($res) ? 1 : 0;
}


function getUserCategories($id_user)
{
	$sql = "SELECT * FROM category WHERE id_user='$id_user'";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
	    $result[] = $row;

	return $result;
}


/* ====== FILES  ====== */

function addfile($id_cat, $name, $size)
{
    $sql = "INSERT INTO files (id_cat, filename, size)
    					VALUES ('$id_cat', '$name', '$size')";
    
    $res = query($sql);

    return ($res) ? 1 : 0;
}

function getFilesFromCat($id_cat) 
{
	$sql = "SELECT * FROM files JOIN category WHERE files.id_cat='$id_cat' AND category.id='$id_cat'";
	$res = query($sql);

	while($row = mysql_fetch_object($res))
		$result[] = $row;

	return $result;
}


function getCountFiles($id) {
	$sql = "SELECT id FROM files WHERE id_cat='$id'";
	$res = query($sql);

	return mysql_num_rows($res);
}

function sizeofFolder($id) {
	$sql = "SELECT size FROM files WHERE id_cat='$id'";
	$res = query($sql);

    $sum = 0;
	while($row = mysql_fetch_object($res))
        $sum += $row->size;

    return $sum;
}

function getDateofLastFile($id)
{
    $sql = "SELECT filename FROM files WHERE id_cat='$id' ORDER BY id DESC LIMIT 1";
    $res = query($sql);
    $row = mysql_fetch_object($res);

    return $row->filename;
}