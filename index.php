<?php 
    session_start();
    if(!isset($_SESSION['page'])){
        $_SESSION['page'] = 1;
    };
    if($_SESSION['page']!=1){
        switch($_SESSION['page']){
            case 2: header('Location: login.php');exit();break;
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
    <title>Xác nhận</title>
    <link rel="stylesheet" href="./css/confirmScreen.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free-5.15.4-web/css/all.min.css">
</head>

<body>
    <div class="form_size">
        <div class="logo-tsb">
            <img src="./image/logo_TOSHIBA/LOGO_TOSHIBA.png" alt="">
        </div>
        <div class="tagline">
            <img src="./image/tagline_chuong_trinh/TAGLINE_chuong_trinh.png" alt="">
        </div>
        <main class="body">
            <form id="frm_reg" class="form_css" action="login.php" method="post">
                <div class="input_field">
                    <label for="">Họ và tên</label><br>
                    <div class="input_item">
                        <i class="far fa-user"></i>
                        <input class="input_name" type="text" name="cus_name" required>
                    </div>
                </div>
                <div class="input_field">
                    <label for="">Số điện thoại</label><br>
                    <div class="input_item">
                        <i class="fas fa-phone-alt"></i>
                        <input class="input_phone" type="text" name="cus_phone" required>
                    </div>
                </div>
                <div class="input_field">
                    <label for="">Địa chỉ</label><br>
                    <div class="input_item">
                        <i class="fas fa-map-marker-alt"></i>
                        <input class="input_addr" type="text" name="cus_addr" required><br>
                    </div>
                    <p class="text_gray">(*)Thông tin bắt buộc</p>
                </div>
                <div class="input_field">
                    <button class="btn_login" name="btn_submit" type="submit">Xác nhận</i></button>
                </div>
            </form>
        </main>

    </div>
</body>
<script src="vendor/jquery.min.js"></script>
<script src="js/index.js"></script>
<script>
// var phoneEl = $('.input_phone');
// phoneEl.change(function(e) {
//     $.ajax({
//             method: "POST",
//             url: "api/cus_get_byPhone.php",
//             data: {
//                 cus_phone: phoneEl.val(),
//             }
//         })
//         .done(function(msg) {
//             if (msg !== "") {
//                 var data = JSON.parse(msg);
//                 $('.input_name').val(data.name);
//                 $('.input_addr').val(data.address);
//             }

//         }).fail(function() {

//         });
// })
$('#frm_reg').submit(function() {
    var regexPhone = /^0\d{9}$/;
    if ($('.input_name').val().trim() == "" || $('.input_phone').val().trim() == "" || $('.input_addr').val()
        .trim() == "" || !regexPhone.test($('.input_phone').val())) {
        alert("Dữ liệu không hợp lệ!");
        return false;
    }
});
</script>
<link rel="stylesheet" href="./css/style.css">

</html>