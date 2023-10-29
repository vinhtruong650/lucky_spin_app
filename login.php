<?php 
    session_start();
    if(!isset($_SESSION['page'])){
        header('Location: index.php');
    };
    if(isset($_POST['btn_submit'])){
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
            <form class="frm_seri" action="./spin.php" method="et">
                <div class="input_field">
                    <label for="">Seri</label> <br>
                    <div class="input_item">
                        <input class="input_seri" type="text"
                            data-cus-phone=<?php if(isset($_SESSION['phone_cus'])) echo $_SESSION['phone_cus']; ?>
                            name="ticket_seri" id="">
                    </div>
                </div>
                <div class="input_field">
                    <label for="">Số mộc</label> <br>
                    <div class="input_item">
                        <input class="input_stamp" type="text" name="ticket_stamp" id="">
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
                            <input id="google" type="checkbox" name="" id=""><label for="google">Google</label>
                        </div>
                        <div class="menu_item">
                            <input id="facebook" style="color: red;" type="checkbox" name="" id=""><label
                                for="facebook">Facebook</label>
                        </div>
                        <div class="menu_item">
                            <input id="sieuthi" type="checkbox" name="" id=""><label for="sieuthi">Siêu thị điện
                                máy</label>
                        </div>
                        <div class="menu_item">
                            <input id="nguoithan" type="checkbox" name="" id=""><label for="nguoithan">Người thân/Bạn
                                bè</label>
                        </div>
                        <div class="menu_item">
                            <input id="khuvuc_sk" type="checkbox" name="" id=""><label for="khuvuc_sk">Tại khu vực sự
                                kiện</label>
                        </div>
                    </div>
                </div>
                <div class="input_field notification d-none">
                    <p>Thông tin đăng nhập không chính xác, vui lòng đăng nhập lại</p>
                </div>
                <div class="input_field">
                    <button type="button" class="btn_login">Đăng nhập</button>
                </div>
            </form>
        </main>

    </div>
</body>
<script src="vendor/jquery.min.js"></script>
<script src="js/index.js"></script>
<script>
$('.input_stamp').change(function() {
    $(".notification").addClass('d-none');
});
$('.input_seri').change(function() {
    $(".notification").addClass('d-none');
});
$('.btn_login').click(function() {
    if ($('.input_seri').val().trim() == "" || $('.input_stamp').val().trim() == "") {
        $(".notification").removeClass('d-none');
        return;
    }
    $.ajax({
            method: "POST",
            url: "api/update_tick.php",
            data: {
                cus_name: $('.input_seri').data('cus-name'),
                cus_phone: $('.input_seri').data('cus-phone'),
                cus_addr: $('.input_seri').data('cus-addr'),
                ticket_seri: $('.input_seri').val(),
                ticket_stamp: $('.input_stamp').val(),
            }
        })
        .done(function(msg) {
            // alert(msg);
            if (msg === "1") {
                window.location.href = 'spin.php';
            } else if (msg === "0") {
                alert("Phiếu quay không hợp lệ hoặc đã sử dụng");
            } else if (msg === "-2") {
                alert("Số mộc không hợp lệ");
            } else if (msg === "-1") {
                alert("Đã xảy ra lỗi!, hãy thử lại");
            }
        }).fail(function() {
            alert("Đã xảy ra lỗi!, hãy thử lại");
        });
});
</script>

</html>