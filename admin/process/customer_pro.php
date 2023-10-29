<?php
$lstSpin = DP::run_query('SELECT * FROM toshiba_lucky_spin.logs',[],2);

if(isset($_POST['btn_search'])){
    if(isset($_POST['search_bp'])){
        $lstSpin = DP::run_query('SELECT * FROM toshiba_lucky_spin.logs where cus_phone=?',[$_POST['search_bp']],2);
    }
}
?>