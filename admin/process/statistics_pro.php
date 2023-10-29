<?php
    $lstGift = DP::run_query('SELECT `id_gift`, `quantity`, `max_quantity_daily`, `status`, `max_quantity_Sat` FROM `gift_of_day` WHERE 1',[],2);

    $lstLogs = DP::run_query('SELECT `time_create`,SUM(`gift_1`) as `gift_1`,SUM(`gift_2`) as `gift_2`,SUM(`gift_3`) as  `gift_3`, SUM(`gift_4`) as `gift_4`, SUM(`gift_5`) as `gift_5` FROM `logs` WHERE logs_state = 1 GROUP by time_create',[],2);
?>