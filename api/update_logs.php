<?php
session_start();
require_once ("../lib/db.php");
// $log=DP::run_query("SELECT `gift_1`, `gift_2`, `gift_3`, `gift_4`, `gift_5`, `logs_gift`, `logs_state` FROM `logs` WHERE (`id_log` = ?) ",[$_SESSION['id_log_current']]);
// for($i=1;$i<6;$i++){
//     $log['gift_$i']=$log['gift_$i']==NULL?0:$log['gift_$i'];
// }
// $vt=$_SESSION['gift'];
// $logs= DP::run_query("UPDATE `logs` SET `gift_$vt` = `gift_$vt+1`, `logs_gift`=`logs_gift+$vt` WHERE `logs`.`id_log` = ?;",[$_SESSION['id_log_current']],1);

// $_SESSION['stamp']-=2;
$_SESSION['page'] = 3;
echo $_SESSION['page'];
?>