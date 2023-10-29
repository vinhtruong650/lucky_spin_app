<?php
session_start();
if(isset($_POST['btn_login'])){
    $us=DP::run_query("SELECT * FROM toshiba_lucky_spin.user where user = ?;",[$_POST['us']],2);
    $pwHash = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    if(count($us)>0){
        if($pwHash == $us[0]['password']) {
            $_SESSION['login_success'] = true;
        }
    }
    
    if(DP::run_query("INSERT INTO `toshiba_lucky_spin`.`user` (`user`, `pass`, `status`) VALUES (?, ?, '1');",[$_POST['us'],$pwHash],1)){
        echo "<script>alert('Thêm thành công!')</script>";
    };
    
}
?>