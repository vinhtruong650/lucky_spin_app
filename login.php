<?php 
    session_start();
    if(!isset($_SESSION['page'])){
        header('Location: index.php');
    };
    if(isset($_SESSION['not_enough'])&&$_SESSION['not_enough']) {
        echo "<script>alert('Không đủ quà để quay')</script>";
        unset($_SESSION['not_enough']);
    }
    if(isset($_POST['btn_submit'])&&$_SESSION['page']==1){
        require_once ("lib/db.php");
        if(trim($_POST["cus_phone"])!=""&& trim($_POST["cus_addr"])!=""&& trim($_POST["cus_name"])!=""){
            $_SESSION['id_log_current'] =  DP::run_query("INSERT INTO `logs` (`cus_name`, `cus_phone`, `cus_add`, `time_create`,`logs_state`) VALUES (?, ?, ?, now(),0);",[$_POST["cus_name"],$_POST["cus_phone"],$_POST["cus_addr"]],3);
            
            // echo $_SESSION['id_log_current'];
            if( $_SESSION['id_log_current']){
                
                $_SESSION["page"] = 2;
                
                
            } 
            else {
                unset($_SESSION['id_log_current']);
                header("Location: index.php");
            };
        }
    }
    if($_SESSION['page']!=2){
        switch($_SESSION['page']){
            case 1: header('Location: index.php');exit();break;
            case 3: header('Location: spin.php');exit();break;
            case 4: header('Location: gift-confirm.php');exit();break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/login_css.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free-5.15.4-web/css/all.min.css">
</head>

<body>
    <div class="form_size">
        <div class="logo-tsb">
            <img src="image/logo_TOSHIBA/LOGO_TOSHIBA.png" alt="">
        </div>
        <div class="tagline">
            <img src="image/tagline_chuong_trinh/TAGLINE_chuong_trinh.png" alt="">
        </div>
        <main class="body">
            <form class="frm_seri" action="./spin.php" method="post">
                <div class="input_field">
                    <label for="">Seri</label> <br>
                    <div class="input_item">
                        <input class="input_seri" type="text" name="ticket_seri" id="">
                    </div>
                </div>
                <div class="input_field">
                    <label for="">Số mộc</label> <br>
                    <div class="input_item">
                        <input class="input_stamp" type="number" name="ticket_stamp" id="">
                    </div>
                    <p class="text_gray">(*)Thông tin bắt buộc</p>
                </div>
                <!-- drop_down -->
                <div class="input_field drop_down">
                    <button class="dropbtn" type="button" onclick=show_hide_dropdown()>
                        <strong>Bạn biết đến nồi chiên không dầu TOSHIBA thông qua kênh nào?</strong>
                    </button>
                    <div class="dropdown-menu">
                        <div class="menu_item">
                            <input id="google" type="checkbox" name="channel[]" value="gg"><label
                                for=" google">Google</label>
                        </div>
                        <div class="menu_item">
                            <input id="facebook" style="color: red;" type="checkbox" value="fb" name=" channel[]"><label
                                for="facebook">Facebook</label>
                        </div>
                        <div class="menu_item">
                            <input id="sieuthi" type="checkbox" name="channel[]" value="st"><label for="sieuthi">Siêu
                                thị
                                điện
                                máy</label>
                        </div>
                        <div class="menu_item">
                            <input id="nguoithan" type="checkbox" name="channel[]" value="nt"><label
                                for="nguoithan">Người
                                thân/Bạn
                                bè</label>
                        </div>
                        <div class="menu_item">
                            <input id="khuvuc_sk" type="checkbox" name="channel[]" value="sk"><label for="khuvuc_sk">Tại
                                khu vực sự
                                kiện</label>
                        </div>
                    </div>
                </div>
                <div class="input_field notification d-none">
                    <p>Thông tin tài khoản chưa chính xác, vui lòng đăng nhập lại</p>
                </div>
                <div class="input_field">
                    <button name="btn_login" class="btn_login" type="submit">Đăng nhập</button>
                </div>
            </form>
        </main>

    </div>
</body>
<script src="vendor/jquery.min.js"></script>
<script src="js/index.js"></script>
<script>
$('.frm_seri').submit(function() {
    var regexPhone = /^\d{4}$/;
    if ($('.input_seri').val().trim() == "" || $('.input_stamp').val().trim() == "" || Number($('.input_seri')
            .val().trim()) >= 8000 || Number($('.input_seri').val().trim()) <= 0 || Number($('.input_stamp')
            .val().trim()) > 17 || Number($('.input_stamp')
            .val().trim()) < 2 || !regexPhone.test($('.input_seri').val())) {


        $(".notification").removeClass('d-none');
        return false;
    }
    <?php
    $_SESSION['flag'] = 1;
    $_SESSION['countspin']=-1;
    ?>
});
</script>

</html>