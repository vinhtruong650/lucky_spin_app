<?php
session_start();
if(isset($_SESSION['login_success'])&&$_SESSION['login_success']==true) header('Location: manage_admin.php');
$level='';
$page_tit='Đăng nhập hệ thống';
$notSigned=true;
$pro_path='process/login_process.php';
$content_path='components/login_frm.php';
require_once('layout.php');
?>