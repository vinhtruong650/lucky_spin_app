<?php 
//INSERT INTO `logs` (`cus_name`, `cus_phone`, `cus_add`, `spin_quantity`, `ticket_stamp`, `ticket_seri`) VALUES ('Vinh', '0884848', '232', '8', '16', '125');
   session_start();
    require_once ("../lib/db.php");
     $log = DP::run_query("INSERT INTO `logs` (`cus_name`, `cus_phone`, `cus_add`, `time_create`,`logs_state`) VALUES (?, ?, ?, now(),0);",[$_POST["cus_name"],$_POST["cus_phone"],$_POST["cus_addr"]],3);
     if($log){
        $_SESSION['id_log_current']=$log;
        echo 1;
     }else echo -1;
?>