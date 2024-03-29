<?php 
    session_start();
    if(!isset($_SESSION['page'])){
        header('Location: index.php');
    };
    require_once ("lib/db.php");
    if(isset($_POST['btn_login'])){
        // echo "<script>alert('".implode(",",$_POST['channel'])."');</script>";
        
        $rs=DP::run_query("UPDATE `logs` SET `channels`=?,`spin_quantity` = ?, `ticket_stamp` = ?, `ticket_seri` = ? WHERE (`id_log` = ?);",[(isset($_POST['channel'])?implode(",",$_POST['channel']):''),floor($_POST["ticket_stamp"]/2),$_POST["ticket_stamp"],$_POST["ticket_seri"],$_SESSION['id_log_current']],1);

        $daynow = getdate()[0];
        
        $giftSumADay_c = DP::run_query("SELECT sum(gift_1) as `G1`, sum(gift_2) as `G2`,sum(gift_3) as `G3`,sum(gift_4) as `G4`,sum(gift_5) as `G5`,sum(tmp_gift1) as `Tg1`,sum(tmp_gift2) as `Tg2`,sum(tmp_gift3) as `Tg3`,sum(tmp_gift4) as `Tg4`,sum(tmp_gift5) as `Tg5` FROM logs where date(time_create) = ? and logs_state <> 2;",[date("Y-m-d",$daynow)],2);
        $sumADay =0;

        if(getdate($daynow)['wday']==6){
            $QuanOfDay = DP::run_query("SELECT SUM(gift1_sat) as 'G1',SUM(gift2_sat) as 'G2',SUM(gift3_sat) as 'G3',SUM(gift4_sat) as 'G4',SUM(gift5_sat) as 'G5',SUM(gift1_status) as `stt1`,Sum(gift2_status) as `stt2`,Sum(gift3_status) as `stt3`,sum(gift4_status) as `stt4`,sum(gift5_status) as `stt5`  FROM gift_of_day;",[],2);
            $sum=0;
            if($QuanOfDay[0]['stt1']==0){
                $sumADay+=$giftSumADay_c[0]['G1'];
                $sum+=$QuanOfDay[0]['G1'];
            }
            if($QuanOfDay[0]['stt2']==0){
                $sumADay+=$giftSumADay_c[0]['G2'];
                $sum+=$QuanOfDay[0]['G2'];
            }
            if($QuanOfDay[0]['stt3']==0){
                $sumADay+=$giftSumADay_c[0]['G3'];
                $sum+=$QuanOfDay[0]['G3'];
            }
            if($QuanOfDay[0]['stt4']==0){
                $sumADay+=$giftSumADay_c[0]['G4'];
                $sum+=$QuanOfDay[0]['G4'];
            }
            if($QuanOfDay[0]['stt5']==0){
                $sumADay+=$giftSumADay_c[0]['G5'];
                $sum+=$QuanOfDay[0]['G5'];
            }
            $rsT = $sum-$sumADay;
        }else{
            $QuanOfDay = DP::run_query("SELECT SUM(gift1_daily) as 'G1',SUM(gift2_daily) as 'G2',SUM(gift3_daily) as 'G3',SUM(gift4_daily) as 'G4',SUM(gift5_daily) as 'G5',SUM(gift1_status) as `stt1`,Sum(gift2_status) as `stt2`,Sum(gift3_status) as `stt3`,sum(gift4_status) as `stt4`,sum(gift5_status) as `stt5`  FROM gift_of_day;",[],2);
            $sum=0;
            if($QuanOfDay[0]['stt1']==0){
                $sumADay+=$giftSumADay_c[0]['G1'];
                $sum+=$QuanOfDay[0]['G1'];
            }
            if($QuanOfDay[0]['stt2']==0){
                $sumADay+=$giftSumADay_c[0]['G2'];
                $sum+=$QuanOfDay[0]['G2'];
            }
            if($QuanOfDay[0]['stt3']==0){
                $sumADay+=$giftSumADay_c[0]['G3'];
                $sum+=$QuanOfDay[0]['G3'];
            }
            if($QuanOfDay[0]['stt4']==0){
                $sumADay+=$giftSumADay_c[0]['G4'];
                $sum+=$QuanOfDay[0]['G4'];
            }
            if($QuanOfDay[0]['stt5']==0){
                $sumADay+=$giftSumADay_c[0]['G5'];
                $sum+=$QuanOfDay[0]['G5'];
            }
            $rsT = $sum-$sumADay;
        }
        $check = (floor($_POST["ticket_stamp"]/2)<=$rsT);


        if($rs&&$_SESSION['flag']==1&&$check) {
            $_SESSION['flag']++;
            $_SESSION['page'] = 3;
            $_SESSION['stamp'] = floor($_POST["ticket_stamp"]/2);
        }else if(!$check){
            $_SESSION['not_enough'] = true;
        }
    }
    
    if($_SESSION['page']!=3){
        switch($_SESSION['page']){
            case 1: header('Location: index.php');exit();break;
            case 4: header('Location: gift-confirm.php');exit();break;
            case 2: header('Location: login.php');exit();break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="vendor/jquery.min.js"></script>
</head>
<header>

</header>

<body class="form_size ">
    <div class="cover d-none">
        <h3 class="text-center text-light">Đang tải...</h3>
    </div>
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
                <img src="image/LUCKY_DRAW/LUCKYDRAW-VONG-XOAY 1.png" alt="" class="vongquay">
                <img src="image/LUCKY_DRAW/LUCKYDRAW_BAN-XOAY 1.png" alt="" class="banquay">
                <img src="image/LUCKY_DRAW/LUCKYDRAW_KIM-XOAY.png" alt="" class="kimquay">
            </div>
            <button id="btn_spin" type="button">
                Bắt đầu quay
            </button>
        </form>

    </div>
    <style>
    body {
        margin: auto;
    }

    .container {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;

    }

    .header {
        margin: 5% 0;
        height: 15%;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .header .contain-logo {
        width: 100%;
        height: 30%;
    }

    .header .contain-tagline {
        width: 100%;
        height: 70%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header .img-logo {
        width: 30%;
        padding: 10px;
    }

    .header .img-tagline {
        width: 70%;
    }

    #spinform {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 85%;
        position: relative;
        margin: auto;
        background-image: url(image/BACKGROUND/vong_xoay.png);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-color: transparent;
        flex-direction: column;
    }

    .spinform_bgspin {
        background-image: url(image/BACKGROUND/Background_vong_xoay_trung_qua.png) !important;
    }

    #spinform #btn_spin {
        position: absolute;
        bottom: 8%;
        border-radius: 50px;
        padding: 5px 20px;
        color: white;
        font-weight: bold;
        background-color: red;
        border: rgba(175, 166, 166, 0.8) 2px solid;
    }

    .draw {
        height: 90%;
        width: 100%;
        position: relative;

    }

    .draw .vongquay {
        width: 80%;
        position: absolute;
        z-index: 1;
        left: 50%;
        top: 45%;
        transform: translate(-50%, -50%);
        /* animation: ani_noichien 7s ease-in-out; */
    }

    .draw .kimquay {
        position: absolute;
        z-index: 3;
        left: 50%;
        width: 15%;
        top: 43%;
        transform: translate(-50%, -50%);
    }

    .draw .banquay {
        position: absolute;
        z-index: 0;
        width: 40%;
        left: 50%;
        top: 45%;
        transform: translate(-50%, -50%);
        margin-top: 45%;
        margin-left: 2px;
    }

    .ani {
        animation-name: rotate;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
        animation-fill-mode: backwards;
    }

    .ani_tuitote_1 {
        animation-name: ani_tuitote_1;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_voucher5_1 {
        animation-name: ani_voucher5_1;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_voucher10_1 {
        animation-name: ani_voucher10_1;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_voucher5_2 {
        animation-name: ani_voucher5_2;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_sotay_1 {
        animation-name: ani_sotay_1;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_voucher10_2 {
        animation-name: ani_voucher10_2;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_tuitote_2 {
        animation-name: ani_tuitote_2;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_voucher5_3 {
        animation-name: ani_voucher5_3;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_voucher10_3 {
        animation-name: ani_voucher10_3;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_voucher5_4 {
        animation-name: ani_voucher5_4;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_sotay_2 {
        animation-name: ani_sotay_2;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .ani_noichien {
        animation-name: ani_noichien;
        animation-timing-function: ease-in-out;
        animation-duration: 8s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
    }

    .cover {
        width: 100vw;
        height: 100vh;
        padding-top: 90%;
        top: 0;
        left: 0;
        position: fixed;
        background-color: rgba(0, 0, 0, .8);
        z-index: 999;
    }

    .fast {
        animation-duration: 3s;
    }

    .slow {
        animation-duration: 5s;
    }

    @keyframes rotate {

        from {
            transform: translate(-50%, -50%) rotate(-360deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    @keyframes ani_tuitote_1 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);

        }

        to {
            transform: translate(-50%, -50%) rotate(2130deg);
        }
    }

    @keyframes ani_voucher5_1 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(2100deg);
        }
    }

    @keyframes ani_voucher10_1 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(2070deg);
        }
    }

    @keyframes ani_voucher5_2 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(2040deg);
        }
    }

    @keyframes ani_sotay_1 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(2010deg);
        }
    }

    @keyframes ani_voucher10_2 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(1980deg);
        }
    }

    @keyframes ani_tuitote_2 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(1950deg);
        }
    }

    @keyframes ani_voucher5_3 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(1920deg);
        }
    }

    @keyframes ani_voucher10_3 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(1890deg);
        }
    }

    @keyframes ani_voucher5_4 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(1860deg);
        }

    }

    @keyframes ani_sotay_2 {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(1830deg);
        }
    }

    @keyframes ani_noichien {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(1800deg);
        }
    }
    </style>
    <script>
    initW_H();

    function initW_H() {
        var h_scr = window.innerHeight;
        var w_scr = window.innerWidth;
        var srcLogin = document.querySelector(".form_size");
        var h_scrLogin = h_scr;
        var w_scrLogin = h_scrLogin * 800.0 / 1340;
        if (w_scrLogin > w_scr) {
            h_scrLogin = w_scr * 1340.0 / 800;
            w_scrLogin = w_scr;
        }
        srcLogin.style.height = h_scrLogin + "px";
        srcLogin.style.width = w_scrLogin + "px";
    }
    window.onresize = initW_H;
    </script>
    <script>
    var awa_ani = '';
    var flag = false;

    function clearAni() {
        $('.vongquay').removeClass('ani_tuitote_1');
        $('.vongquay').removeClass('ani_tuitote_2');
        $('.vongquay').removeClass('ani_voucher5_1');
        $('.vongquay').removeClass('ani_voucher5_2');
        $('.vongquay').removeClass('ani_voucher5_3');
        $('.vongquay').removeClass('ani_voucher5_4');
        $('.vongquay').removeClass('ani_voucher10_1');
        $('.vongquay').removeClass('ani_voucher10_2');
        $('.vongquay').removeClass('ani_voucher10_3');
        $('.vongquay').removeClass('ani_sotay_1');
        $('.vongquay').removeClass('ani_sotay_2');
    }
    $(document).ready(function() {

        $('#btn_spin').click(function() {
            clearAni();
            $('.cover').removeClass('d-none');

            $('#btn_spin').hide();
            $.ajax({
                    method: "POST",
                    url: "api/get_gift.php",
                    data: {}
                })
                .done(function(msg) {

                    // alert(msg);
                    if (msg == '-1') {
                        alert("Đã hết quà!!");
                        window.location.href = 'login.php';
                    }
                    $('.cover').addClass('d-none');
                    // alert(awa_ani);

                    // console.log(msg);
                    if (msg == "1") {
                        awa_ani = 'ani_noichien';
                    }
                    if (msg == "2") {
                        awa_ani = 'ani_sotay_' + (Math.floor(Math.random() * 2) + 1);
                    }
                    if (msg == "3") {
                        awa_ani = 'ani_tuitote_' + (Math.floor(Math.random() * 2) + 1);
                    }
                    if (msg == "4") {
                        awa_ani = 'ani_voucher5_' + (Math.floor(Math.random() * 4) + 1);
                    }
                    if (msg == "5") {
                        awa_ani = 'ani_voucher10_' + (Math.floor(Math.random() * 3) + 1);
                    }
                    // alert(awa_ani);

                    if (flag == false) {
                        // console.log(flag);

                        $('#spinform').addClass('spinform_bgspin');
                        $(".vongquay").addClass(awa_ani);
                        flag = true;
                        // console.log(flag);
                        setTimeout(
                            "window.location.href='gift-confirm.php';$('#spinform').removeClass('spinform_bgspin');",
                            10000);
                    }
                });

        });
    });
    </script>
</body>

</html>