<?php

session_start();

$_SESSION['id_user']='';
$_SESSION['username']='';
$_SESSION['password']='';
$_SESSION['nama_lengkap']='';
$_SESSION['alamat']='';
$_SESSION['status']='';

unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_lengkap']);
unset($_SESSION['alamat']);
unset($_SESSION['status']);


session_unset();
session_destroy();

header("location:index.php");
