<?php 
    require_once('../../lib/db.php');
   if($_POST['id_gift']>0 && $_POST['id_gift']<6){
    DP::run_query("UPDATE `toshiba_lucky_spin`.`gift_of_day` SET `gift".$_POST['id_gift']."_status` = ? WHERE (`id_gift` = '1')",[$_POST['stt']],1);
    echo $_POST['stt'];
   }
?>