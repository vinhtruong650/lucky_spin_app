<?php 
    session_start();  
     
    require_once ("../lib/db.php");
    if($_POST["cus_phone"]!=""&& $_POST["cus_addr"]!=""&& $_POST["cus_name"]!=""){
        $cus = DP::run_query("SELECT * FROM toshiba_lucky_spin.customer where phone = ?;",[$_POST["cus_phone"]],2);
    if(count($cus)>0){
        if($_POST["cus_name"]!=$cus[0]['name']){
            echo -1;
            return;
        }
        $_SESSION["phone_cus"] = $_POST["cus_phone"];
        $_SESSION["page"] = 2;
    }else{
        $rs1 = DP::run_query("INSERT INTO `toshiba_lucky_spin`.`customer` (`name`, `phone`, `address`,`status`) VALUES (?, ?, ?,0);",[$_POST["cus_name"],$_POST["cus_phone"],$_POST["cus_addr"]],1);
        if($rs1){
            $_SESSION["phone_cus"] = $_POST["cus_phone"];
            $_SESSION["page"] = 2;
            echo 1;
        } 
        else {
            http_response_code(500);
        };
    }
    }
    
    
     
     
?>