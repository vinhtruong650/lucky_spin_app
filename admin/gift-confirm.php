<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIFT</title>
    <link rel="stylesheet" href="../css/gift-confirm.css">
</head>
<body class="form_size ">
    <div class="container">
        <div class="header">
            <div class="Row contain-logo">
                <img src="../image/logo_TOSHIBA/LOGO_TOSHIBA.png" alt="" class="img-logo">
            </div>
            <div class="Row contain-tagline">
                <img src="../image/tagline_chuong_trinh/TAGLINE_chuong_trinh.png" alt="" class="img-tagline">
            </div>

        </div>
        <form action="" id="spinform">
            <div class="draw">
                <p id="tag">chúc mừng bạn đã trúng được</p>
                <p class="" id="gift-name">01 túi tote</p>
                <div class="mb-3 mt-3 text-center">
                    <p id="msg_alert" class="d-none" style="color: #f6d883;"></p>
                    <button type="button" name="btn_close" id="btn_close" onclick="btn();"
                        style="
                   margin-bottom: 30px; font-weight:900;border-radius: 1rem;background: linear-gradient(to bottom,red,red,red);border:none;color:white;"
                        class="btn btn-success h3">Kết thúc</button>
                </div>
            </div>
            <div id="nckd">
                <img src="../image/noi_chien/nckd.png" alt="" id="nckd">
            </div>
        </form>

    </div>

</body>
<script src="../vendor/jquery.min.js"></script>
<script src="../js/index.js"></script>
</html>