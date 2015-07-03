<?php
session_start();
$_SESSION['uid'] = '';
$_SESSION['login'] = '';
$_SESSION['username'] = '';
$_SESSION['education'] = '';
$_SESSION['position'] = '';
$_SESSION['phone'] = '';
$_SESSION['end_access'] = '';
$_SESSION['contract'] = '';
$_SESSION['inn'] = '';
$_SESSION['snils'] ='';
$_SESSION['role'] = '';

include_once('../config/config.php');

if (isset($_POST['login']) && isset($_POST['password']) && $_POST['login'] != '' && $_POST['password'] != '') 
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM personal WHERE login='$login' AND password='$password'";
    $res = query($sql);
    
    $n = mysql_num_rows($res);
    
    if ($n != 0) {
        
        $row = mysql_fetch_object($res);
        
        $_SESSION['uid'] = $row->id;
        $_SESSION['login'] = $row->login;
        $_SESSION['username'] = $row->username;
        $_SESSION['education'] = $row->education;
        $_SESSION['position'] = $row->position;
        $_SESSION['phone'] = $row->phone;
        $_SESSION['end_access'] = $row->end_access;
        $_SESSION['contract'] = $row->contract;
        $_SESSION['inn'] = $row->inn;
        $_SESSION['snils'] = $row->snils;
        $_SESSION['role'] = $row->role;
        
        header('location: ../../?option=allpersonal');
    }
    else {
        unset($_SESSION['uid']);
        header('location: ../../index.php');
    }
}
else {
        unset($_SESSION['uid']);
        header('location: ../../index.php');
}