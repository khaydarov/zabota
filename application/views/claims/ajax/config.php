<?php

$conn = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('social', $conn);
mysql_query("SET NAMES utf8");