<?php
if(isset($_POST['btn_login'])){
    $us=DP::run_query("SELECT * FROM toshiba_lucky_spin.user where user = ? and status <> 2;",[$_POST['us']],2);
    $pwHash = md5($_POST['pass']);
    if(count($us)>0){
        echo $pwHash;
        if($pwHash == $us[0]['pass']) {
            $_SESSION['login_success'] = true;
            header('Location: gift.php');
        }
    }
}
?>