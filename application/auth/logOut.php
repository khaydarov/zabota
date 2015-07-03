<?php

session_start();
$_SESSION['uid'] = '';
$_SESSION['login'] = '';
$_SESSION['lastname'] = '';
$_SESSION['email'] = '';
$_SESSION['id_dep'] = '';
$_SESSION['id_sec'] = '';
$_SESSION['role'] = '';

unset($_SESSION['uid']);
header('location: ../../index.php');