<?php
require('../lib/db.php');
$ngayHienTai = date('N'); // 'N' trả về số nguyên từ 1 đến 7

$check=DP::run_query("SELECT * FROM `gift_of_day` where status=1",[],2);
if($check==null){
    echo -1;
}
again:
$percen = rand(0, 1000) / 10;

$lstGift=DP::run_query("SELECT * FROM `gift_of_day`",[],2);
if($ngayHienTai!=6)
if($percen>=0&&$percen<=0.2){
    if($lstGift[0]['status']==1)
        goto again;

    echo 1;
}
else if($percen<=2.5){
    if($lstGift[1]['status']==1)
        goto again;
    echo 2;
}
else if($percen<=4.8){
    if($lstGift[2]['status']==1)
        goto again;
    echo 3;
}
else if($percen<=4.8+38.1){
    if($lstGift[3]['status']==1)
        goto again;
    echo 4;
}
else{
    if($lstGift[4]['status']==1)
        goto again;
    echo 5;
}
else
if($percen>=0&&$percen<=0.2){
    if($lstGift[0]['status']==1)
        goto again;

    echo 1;
}
else if($percen<=2.8){
    if($lstGift[1]['status']==1)
        goto again;
    echo 2;
}
else if($percen<=5.2){
    if($lstGift[2]['status']==1)
        goto again;
    echo 3;
}
else if($percen<=5.2+37.8){
    if($lstGift[3]['status']==1)
        goto again;
    echo 4;
}
else{
    if($lstGift[4]['status']==1)
        goto again;
    echo 5;
}

?>