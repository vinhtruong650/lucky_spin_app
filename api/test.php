<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$ngayHienTai = date('N'); // 'N' trả về số nguyên từ 1 đến 7


require_once('../lib/db.php');
if($ngayHienTai!=6)
$lst_setting_awa= DP::run_query('SELECT `gift1_daily`, `gift2_daily`, `gift3_daily`, `gift4_daily`, `gift5_daily` FROM `gift_of_day`',[],2)[0];
else
$lst_setting_awa= DP::run_query('SELECT `gift1_sat`, `gift2_sat`, `gift3_sat`, `gift4_sat`, `gift5_sat` FROM `gift_of_day`',[],2)[0];
$lst_num_awa = DP::run_query('SELECT SUM(gift1) as `gift1`,SUM(gift2) as `gift2`,SUM(gift3) as `gift3`,SUM(gift4) as `gift4`,SUM(gift5) as `gift5` FROM `logs` WHERE status=1 && time_create=NOW()',[],2)[0];
$lst_num = [$lst_setting_awa['gift1']-($lst_num_awa['gift1']==''?0:$lst_num_awa['gift1']),$lst_setting_awa['gift2']-($lst_num_awa['gift2']==''?0:$lst_num_awa['gift2']),$lst_setting_awa['gift3']-($lst_num_awa['gift3']==''?0:$lst_num_awa['gift3']),$lst_setting_awa['gift4']-($lst_num_awa['gift4']==''?0:$lst_num_awa['gift4']),$lst_setting_awa['gift5']-($lst_num_awa['gift5']==''?0:$lst_num_awa['gift5'])];
$min=0;
foreach($lst_num as $val){
    if($val>0 && ($min==0 || $val<$min)){
        $min=$val;
    }
}
if($min==0)
{
    echo -1;
}
$lst_awa=[];
foreach($lst_num as $key=>$val)
{
    for($i=0;$i<$val/$min;$i++){
        $lst_awa[]=$key;
    }
}
shuffle($lst_awa);
if(!isset($_SESSION['draw_awa']))
{
    $_SESSION['draw_awa']=[];
    $_SESSION['time'] = true;
    array_push($_SESSION['draw_awa'],$lst_awa[rand(0,4)]);
    DP::run_query('update `mem_log` set draw_history=? WHERE `id`=?',[$_SESSION['draw_awa'][count($_SESSION['draw_awa'])-1],$_SESSION['id_log']],1);
}
if($_SESSION['time'] === false)
{
    array_push($_SESSION['draw_awa'],$lst_awa[rand(0,4)]);
    $_SESSION['time'] = true;
    DP::run_query('update `mem_log` set draw_history=concat(draw_history,\'_\',?) WHERE `id`=?',[$_SESSION['draw_awa'][count($_SESSION['draw_awa'])-1],$_SESSION['id_log']],1);
}
echo $_SESSION['draw_awa'][count($_SESSION['draw_awa'])-1];
?>