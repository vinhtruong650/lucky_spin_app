<?php
$lstSpin = DP::run_query('SELECT * FROM logs order by time_create desc',[],2);
if(isset($_GET['btn_search'])){
    $isFirst = false;
    if(isset($_GET['search_date']) && isset($_GET['stt'])&&$_GET['search_date']!=""&&$_GET['stt']!=""){
        if($_GET['stt']!=3){
            $lstSpin = DP::run_query('SELECT * FROM logs where date(time_create)=? and logs_state = ? order by time_create desc',[$_GET['search_date'],$_GET['stt']],2);
        }
        else {
            $lstSpin = DP::run_query('SELECT * FROM logs where date(time_create)=? order by time_create desc',[$_GET['search_date']],2);
        }
    }else if(isset($_GET['search_date'])&&$_GET['search_date']!=""){
        $lstSpin = DP::run_query('SELECT * FROM logs where date(time_create)=? order by time_create desc',[$_GET['search_date']],2);
    }else if(isset($_GET['stt'])&&$_GET['stt']!=""){
        if($_GET['stt']!=3){
            $lstSpin = DP::run_query('SELECT * FROM logs where logs_state = ? order by time_create desc',[$_GET['stt']],2);
        }
        else {
            $lstSpin = DP::run_query('SELECT * FROM logs where 1 order by time_create desc',[],2);
        }
    }
}else{
    $isFirst = true;
    $lstSpin = DP::run_query('SELECT * FROM logs where date(time_create)=? order by time_create desc',[date("Y-m-d")],2);
}
?>