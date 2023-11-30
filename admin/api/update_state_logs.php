<?php 
    require_once('../../lib/db.php');
    if(isset($_POST['id_Btn'])&&isset($_POST['type'])){
        $stt = DP::run_query("SELECT gift_1,gift_2,gift_3,gift_4,gift_5,logs_state FROM logs where id_log = ?;",[$_POST['id_Btn']],2);
        $isNew = 0;
        $isUpdate =0;
        if($stt[0]['logs_state']==0){
            $isNew = 1;
            $isUpdate = 1;
        };
        
        if($isNew==0){
            if($_POST['type']==1){
               $rs = DP::run_query("UPDATE `gift_of_day` SET `gift1_used` = gift1_used - ".$stt[0]['gift_1'].", `gift2_used` = gift2_used - ".$stt[0]['gift_2'].", `gift3_used` = gift3_used - ".$stt[0]['gift_3'].", `gift4_used` = gift4_used - ".$stt[0]['gift_4'].", `gift5_used` = gift5_used - ".$stt[0]['gift_5']." WHERE (`id_gift` = 1);",[],1);
               if($rs) $isUpdate = 1;
               else $isUpdate = 0;
            }else{
                $rs = DP::run_query("UPDATE `gift_of_day` SET `gift1_used` = gift1_used + ".$stt[0]['gift_1'].", `gift2_used` = gift2_used + ".$stt[0]['gift_2'].", `gift3_used` = gift3_used + ".$stt[0]['gift_3'].", `gift4_used` = gift4_used + ".$stt[0]['gift_4'].", `gift5_used` = gift5_used + ".$stt[0]['gift_5']." WHERE (`id_gift` = 1);",[],1);
                if($rs) $isUpdate = 1;
               else $isUpdate = 0;
            }
        }

        if($_POST['type']==1 && $isUpdate==1){
            if(DP::run_query("UPDATE `logs` SET `logs_state` = '2' WHERE (`id_log` = ?);",[$_POST['id_Btn']],1)){
                echo 1;
            }else{
                echo 0;
            }
        }
        else if($isUpdate==1){
            if(DP::run_query("UPDATE `logs` SET `logs_state` = '1' WHERE (`id_log` = ?);",[$_POST['id_Btn']],1)){
                echo 1;
            }else{
                echo 0;
            }
        }
        else echo -1;
        
    }
?>