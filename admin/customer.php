<?php
session_start();
if(!isset($_SESSION['login_success'])) header('Location: login.php');
$page_tit='Quản lí tài khoản admin';
$pro_path='process/customer_pro.php';
$content_path='components/customer_content.php';
//$js='components/gift_js.php';
require_once('layout.php');
?>