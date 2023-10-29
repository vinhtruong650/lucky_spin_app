<?php 
   session_start();
    require_once ("../lib/db.php");
    if($_POST["ticket_seri"]>=0&&$_POST["ticket_seri"]<=8000 && $_POST["ticket_stamp"]<=17){
      $rs2 = DP::run_query("UPDATE `toshiba_lucky_spin`.`tickets` SET  `cus_phone` = ?, `status` = 1 WHERE (`seri` = ?);",[$_POST["cus_phone"],$_POST["ticket_seri"]],1);
        if($rs2) {
         $_SESSION['page'] = 3;
         $_SESSION['stamp'] = floor($_POST["ticket_stamp"]/2);
         echo 1;
         $rs=DP::run_query("UPDATE `toshiba_lucky_spin`.`logs` SET `spin_quantity` = ?, `ticket_stamp` = ?, `ticket_seri` = ? WHERE (`id_log` = ?);",[$_POST["ticket_stamp"]/2,$_POST["ticket_stamp"],$_POST["ticket_seri"],$_SESSION['id_log_current']],1);
        }else echo -1;
    }else{
      echo 0;
   }
?>