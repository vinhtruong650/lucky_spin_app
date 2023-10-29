<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$ngayHienTai = date('N'); // 'N' trả về số nguyên từ 1 đến 7


require_once('../lib/db.php');
$lst_setting_awa= DP::run_query('SELECT `id_gift`, `gift1_daily`, `gift2_daily`, `gift3_daily`, `gift4_daily`, `gift5_daily`, `gift1_sat`, `gift2_sat`, `gift3_sat`, `gift4_sat`, `gift5_sat`, `gift1_quantity`, `gift2_quantity`, `gift3_quantity`, `gift4_quantity`, `gift5_quantity`, `gift1_status`, `gift2_status`, `gift3_status`, `gift4_status`, `gift5_status` FROM `gift_of_day` WHERE 1',[],2)[0];
$lst_num_awa = DP::run_query('SELECT SUM(gift_1) as `gift_1`,SUM(gift_2) as `gift_2`,SUM(gift_3) as `gift_3`,SUM(gift_4) as `gift_4`,SUM(gift_5) as `gift_5`,SUM(tmp_gift1) as `tmp_gift1`,SUM(tmp_gift2) as `tmp_gift2`,SUM(tmp_gift3) as `tmp_gift3`,SUM(tmp_gift4) as `tmp_gift4`,SUM(tmp_gift5) as `tmp_gift5` FROM `logs` WHERE logs_state=1 || logs_state=0 && time_create=NOW()',[],2)[0];
if($ngayHienTai!=6)
$lst_num = [$lst_setting_awa['gift1_daily']-($lst_num_awa['gift_1']==''?0:$lst_num_awa['gift_1'])-($lst_num_awa['tmp_gift1']==''?0:$lst_num_awa['tmp_gift1']),$lst_setting_awa['gift2_daily']-($lst_num_awa['gift_2']==''?0:$lst_num_awa['gift_2'])-($lst_num_awa['tmp_gift2']==''?0:$lst_num_awa['tmp_gift2']),$lst_setting_awa['gift3_daily']-($lst_num_awa['gift_3']==''?0:$lst_num_awa['gift_3'])-($lst_num_awa['tmp_gift3']==''?0:$lst_num_awa['tmp_gift3']),$lst_setting_awa['gift4_daily']-($lst_num_awa['gift_4']==''?0:$lst_num_awa['gift_4'])-($lst_num_awa['tmp_gift4']==''?0:$lst_num_awa['tmp_gift4']),$lst_setting_awa['gift5_daily']-($lst_num_awa['gift_5']==''?0:$lst_num_awa['gift_5'])-($lst_num_awa['tmp_gift5']==''?0:$lst_num_awa['tmp_gift5'])];
else
$lst_num = [$lst_setting_awa['gift1_sat']-($lst_num_awa['gift_1']==''?0:$lst_num_awa['gift_1'])-($lst_num_awa['tmp_gift1']==''?0:$lst_num_awa['tmp_gift1']),$lst_setting_awa['gift2_sat']-($lst_num_awa['gift_2']==''?0:$lst_num_awa['gift_2'])-($lst_num_awa['tmp_gift2']==''?0:$lst_num_awa['tmp_gift2']),$lst_setting_awa['gift3_sat']-($lst_num_awa['gift_3']==''?0:$lst_num_awa['gift_3'])-($lst_num_awa['tmp_gift3']==''?0:$lst_num_awa['tmp_gift3']),$lst_setting_awa['gift4_sat']-($lst_num_awa['gift_4']==''?0:$lst_num_awa['gift_4'])-($lst_num_awa['tmp_gift4']==''?0:$lst_num_awa['tmp_gift4']),$lst_setting_awa['gift5_sat']-($lst_num_awa['gift_5']==''?0:$lst_num_awa['gift_5'])-($lst_num_awa['tmp_gift5']==''?0:$lst_num_awa['tmp_gift5'])];
$lst_awa=[];
$min=0;
for($i=0 ; $i < count($lst_num) ; $i++){
    if($lst_num[$i]>0 && ($min==0 || $lst_num[$i]<$min)){
        $min=$lst_num[$i];
    }
    for($j = 0; $j<$lst_num[$i];$j++){
        $vt=$i+1;
        if($lst_setting_awa['gift'.$vt.'_status']==0){
            $lst_awa[]= $i+1;
            
        }
        else { break;}
    }

}


if(count($lst_awa)==0)
{
    echo -1;
$_SESSION['page']=1;

}
else
{
    shuffle($lst_awa);

$_SESSION['page']=4;
 
$gift = $lst_awa[rand(0,count($lst_num))];
$_SESSION['gift']=$gift;
$vt=$_SESSION['gift'];
$logs= DP::run_query("UPDATE `logs` SET `tmp_gift$vt` = `tmp_gift$vt`+1 WHERE `logs`.`id_log` = ?;",[$_SESSION['id_log_current']],1);

echo $gift;
// echo json_encode($lst_awa);
}
?>