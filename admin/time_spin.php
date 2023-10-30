<?php
session_start();
if(!isset($_SESSION['login_success'])) header('Location: login.php');
$level='';
$page_tit='Lượt quay';
$pro_path='process/spin_pro.php';
$content_path='components/spin_content.php';
require_once('layout.php');
?>