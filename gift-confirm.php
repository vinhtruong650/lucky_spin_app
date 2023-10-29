<?php 
    session_start();
    if(!isset($_SESSION['page'])){
        header('Location: index.php');
    };
    if($_SESSION['page']!=4){
        switch($_SESSION['page']){
            case 1: header('Location: index.php');exit();break;
            case 3: header('Location: spin.php');exit();break;
            case 2: header('Location: login.php');exit();break;
        }
    }
    $giftname="";

    switch($_SESSION['gift']){
        case 1: $giftname="1 Nồi chiên không dầu";break;
        case 2: $giftname="1 sổ tay";break;
        case 3: $giftname="1 túi Tote";break;
        case 4: $giftname="1 voucher 5%";break;
        case 5: $giftname="1 voucher 10%";break;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIFT</title>
    <link rel="stylesheet" href="css/gift-confirm.css">
</head>
<header>

</header>

<body class="form_size ">
    <div class="container">
        <div class="header">
            <div class="Row contain-logo">
                <img src="image/logo_TOSHIBA/LOGO_TOSHIBA.png" alt="" class="img-logo">
            </div>
            <div class="Row contain-tagline">
                <img src="image/tagline_chuong_trinh/TAGLINE_chuong_trinh.png" alt="" class="img-tagline">
            </div>

        </div>
        <form action="" id="spinform">
            <div class="draw">
                <p id="tag">chúc mừng bạn đã trúng được</p>
                <p class="" id="gift-name"><?php echo $giftname  ?></p>
                <div class="mb-3 mt-3 text-center">
                    <p id="msg_alert" class="d-none" style="color: #f6d883;"></p>
                    <?php
                        if($_SESSION['stamp']>=2){
                            echo "<button type='button' name='btn_close' id='btn_close' onclick=btnTiepTuc()
                            style='
                       margin-bottom: 30px; font-weight:900;border-radius: 1rem;background: linear-gradient(to bottom,red,red,red);border:none;color:white;'class='btn btn-success h3'>Tiếp tục</button>";
                        
                        }
                        else {
                            echo "<button type='button' name='btn_close' id='btn_close' onclick='btnKetThuc()'
                            style='
                       margin-bottom: 30px; font-weight:900;border-radius: 1rem;background: linear-gradient(to bottom,red,red,red);border:none;color:white;'class='btn btn-success h3'>Kết thúc</button>";
                        }
                    ?>
                    
                </div>
            </div>
            <div id="nckd">
                <?php if($_SESSION['gift']==1) echo "<img src='image/noi_chien/nckd.png' alt='' id='nckd'>"; ?>
            </div>
        </form>

    </div>

</body>
<script src="vendor/jquery.min.js"></script>
<script src="js/index.js"></script>
<script>
    

function btnTiepTuc() {
    $.ajax({
                method: "POST",
                url: "api/update_logs.php",
                data: {}
            })
            .done(function (msg) {
                alert(msg);
                window.location.href='spin.php'
            }).fail(function(){
                alert("Đã xảy ra lỗi!, hãy thử lại");
            })

}
</script>
</html>

