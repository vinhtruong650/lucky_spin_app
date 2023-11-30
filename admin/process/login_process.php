<?php
if(isset($_POST['btn_login'])){
    $us=DP::run_query("SELECT * FROM user where user = ? and status <> 2;",[$_POST['us']],2);
    $pwHash = md5($_POST['pass']);
    if(count($us)>0){
        if($pwHash == $us[0]['pass']) {
            $_SESSION['username'] = $us[0]['user'];
            $_SESSION['login_success'] = true;
            header('Location: gift.php');
        }
    }
}
?>