<?php 
    require_once ("../lib/db.php");
     $cus = DP::run_query("SELECT * FROM toshiba_lucky_spin.customer where phone = ?;",[$_POST["cus_phone"]],2);
     if(count($cus)>0){
       echo json_encode($cus[0]);
     }
     
?>