<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('../lib/db.php');
if(isset($_POST['btn_submit'])){
    $lstGift=DP::run_query('select `id_gift` `max_quantity_daily`,`max_quantity_Sat` from gift_of_day where status==0' );
}

?>