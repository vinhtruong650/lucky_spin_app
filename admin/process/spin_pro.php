<?php
$lstSpin = DP::run_query('SELECT * FROM toshiba_lucky_spin.logs',[],2);
if(isset($_POST['btn_search'])){
    if(isset($_POST['search_date'])){
        $lstSpin = DP::run_query('SELECT * FROM toshiba_lucky_spin.logs where date(time_create)=?',[$_POST['search_date']],2);
    }
}
if(isset($_POST['btn_checked'])){
    if(isset($_POST['stt'])){
        $lstSpin = DP::run_query('SELECT * FROM toshiba_lucky_spin.logs where logs_state=?',[$_POST['stt']],2);
    }
}
?>