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
            <form class="form_css" action="login.php" method="post">
                <div class="input_field">
                    <label for="">Họ và tên</label><br>
                    <div class="input_item">
                        <i class="far fa-user"></i>
                        <input class="input_name" type="text" name="cus_name" required>
                    </div>
                </div>
                <div class="input_field">
                    <label for="">Số điện thoại</label><br>
                    <div class="input_item" >
                        <i class="fas fa-phone-alt"></i>
                        <input class="input_phone" type="text" name="cus_phone" required>
                    </div>
                </div>
                <div class="input_field">
                    <label for="">Địa chỉ</label><br>
                    <div class="input_item" >
                        <i class="fas fa-map-marker-alt"></i>
                        <input class="input_addr" type="text" name="cus_addr" required><br>
                    </div>
                    <p class="text_gray">(*)Thông tin bắt buộc</p>
                </div>
                <div class="input_field">
                    <button class="btn_login" type="button">Xác nhận</i></button>
                </div>
            </form>
        </main>
        
    </div>
</body>
<script src="vendor/jquery.min.js"></script>
<script src="js/index.js"></script>
<script>
    var phoneEl = $('.input_phone');
    phoneEl.change(function(e){
        $.ajax({
                method: "POST",
                url: "api/cus_get_byPhone.php",
                data: {
                    cus_phone:phoneEl.val(),
                }
            })
            .done(function (msg) {
                if(msg!==""){
                    var data = JSON.parse(msg);
                    $('.input_name').val(data.name);
                    $('.input_addr').val(data.address);
                }
                
            }).fail(function(){
                
            });
    })
    $('.btn_login').click(function(){
        if($('.input_name').val().trim()==""||$('.input_phone').val().trim()==""||$('.input_addr').val().trim()==""){
            alert("Không để trống dữ liệu");
            return;
        }
        $.ajax({
                method: "POST",
                url: "api/insert_cus.php",
                data: {
                    cus_name: $('.input_name').val().trim(),
                    cus_phone:$('.input_phone').val().trim(),
                    cus_addr:$('.input_addr').val().trim(),
                }
            })
            .done(function (msg) {
                if(msg=="1") {
                    $.ajax({
                    method: "POST",
                    url: "api/log_init.php",
                    data: {
                        cus_name: $('.input_name').val().trim(),
                        cus_phone:$('.input_phone').val().trim(),
                        cus_addr:$('.input_addr').val().trim(),
                    }}).done(function (msg) {
                        $('.form_css').submit();
                    }).fail(function(){});
                    
                }
                else if(msg=="-1"){
                    alert("Số điện thoại đã tồn tại");
                }
                else {
                    $.ajax({
                    method: "POST",
                    url: "api/log_init.php",
                    data: {
                        cus_name: $('.input_name').val().trim(),
                        cus_phone:$('.input_phone').val().trim(),
                        cus_addr:$('.input_addr').val().trim(),
                    }}).done(function (msg) {
                        $('.form_css').submit();
                    }).fail(function(){});
                    
                }
            }).fail(function(){
                alert("Đã xảy ra lỗi!, hãy thử lại");
            }); 
    });
    
</script>
</html>