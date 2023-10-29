<?php
session_start();
require_once ("../lib/db.php");
// if()
// $log=DP::run_query("SELECT  `gift_1`, `gift_2`, `gift_3`, `gift_4`, `gift_5`, `logs_gift`, `logs_state` FROM `logs` WHERE id_log=? ",[$_SESSION['id_log_current']],2);

$vt=$_SESSION['gift'];
$logs= DP::run_query("UPDATE `logs` SET `gift_$vt` = `gift_$vt`+1, `logs_gift`=concat(`logs_gift`,',',".$vt.") WHERE `logs`.`id_log` = ?;",[$_SESSION['id_log_current']],1);

if($_SESSION['stamp']>=2){
$_SESSION['page'] = 3;
}
else{
$_SESSION['page']=1;
DP::run_query("UPDATE `logs` SET `tmp_gift1`=0,`tmp_gift2`=0,`tmp_gift3`=0,`tmp_gift4`=0,`tmp_gift5`=0,`logs_state`=1 WHERE `logs`.`id_log` = ?;",[$_SESSION['id_log_current']],1);


$log=DP::run_query("SELECT  `gift_1`, `gift_2`, `gift_3`, `gift_4`, `gift_5`, `logs_gift`, `logs_state` FROM `logs` WHERE id_log=? AND logs_state=1",[$_SESSION['id_log_current']],2)[0];
DP::run_query("UPDATE `gift_of_day` SET `gift1_used` = `gift1_used`+".$log['gift_1'].", `gift2_used` = `gift2_used`+".$log['gift_2'].",`gift3_used` = `gift3_used`+".$log['gift_3'].",`gift4_used` = `gift4_used`+".$log['gift_4'].",`gift5_used` = `gift5_used`+".$log['gift_5']."",[],1);
}
$_SESSION['stamp']-=1;

echo $_SESSION['page'];
?>