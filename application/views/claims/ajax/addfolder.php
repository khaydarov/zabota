<?php
session_start();

	include('config.php');
	
	$name = $_POST['name'];
    $uid = $_SESSION['uid'];

    $sql = "INSERT INTO category(id_user, name) VALUES('$uid', '$name')";
    $result = mysql_query($sql);

    echo ($result) ? 1 : 0;
?>