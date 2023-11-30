<?php
$awa=['NỒI CHIÊN Quay may mắn','Sổ tay','Túi','Voucher 5%','Voucher 10%'];

$lstGift = DP::run_query('SELECT * FROM gift_of_day',[],2)[0];

$lstQuan= DP::run_query("SELECT  date(time_create) as `Ngay`, Sum(gift_1) as `SL1`,Sum(gift_2) as `SL2`,Sum(gift_3) as `SL3`,Sum(gift_4) as `SL4`,Sum(gift_5) as `SL5` FROM logs 
where logs_state = 1 
group by date(time_create) order by `Ngay` desc",[],2);

$lstWait = DP::run_query("SELECT  date(time_create) as `Ngay`, Sum(tmp_gift1) as `SL1`,Sum(tmp_gift2) as `SL2`,Sum(tmp_gift3) as `SL3`,Sum(tmp_gift4) as `SL4`,Sum(tmp_gift5) as `SL5` FROM logs 
where logs_state = 0 
group by date(time_create) order by `Ngay` desc",[],2);


?>