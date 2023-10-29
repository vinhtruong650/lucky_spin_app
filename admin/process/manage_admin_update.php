<?php

if(isset($_POST['btn_add'])){
    $us=DP::run_query("SELECT * FROM toshiba_lucky_spin.user where user = ?;",[$_POST['us']],2);
    if(count($us)>0){
        echo "<script>alert('Tài khoản đã tồn tại!')</script>";
    }else{
        $pwHash = md5($_POST['pass']);
    if(DP::run_query("INSERT INTO `toshiba_lucky_spin`.`user` (`user`, `pass`, `status`) VALUES (?, ?, '1');",[$_POST['us'],$pwHash],1)){
        echo "<script>alert('Thêm thành công!')</script>";
    };
    }
}

if(isset($_POST['btn_nohide'])){
    DP::run_query("UPDATE `toshiba_lucky_spin`.`user` SET `status` = '2' WHERE (`user` = ?);",[$_POST['us_edit']],1);
}
if(isset($_POST['btn_hide'])){
    DP::run_query("UPDATE `toshiba_lucky_spin`.`user` SET `status` = '1' WHERE (`user` = ?);",[$_POST['us_edit']],1);
}


$lstAcc = DP::run_query("SELECT * FROM toshiba_lucky_spin.user where status <> 0;",[],2);

?>