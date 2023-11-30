<?php
$lstSpin = DP::run_query('SELECT * FROM logs',[],2);

if(isset($_POST['btn_search'])){
    if(isset($_POST['search_bp'])){
        $lstSpin = DP::run_query('SELECT * FROM logs where cus_phone=?',[$_POST['search_bp']],2);
    }
}

function chuanHoa($before){
    if($before!=NULL){
        $before=str_replace('gg','Google',$before);
        $before=str_replace('fb','Facebook',$before);
        $before=str_replace('st','Siêu thị',$before);
        $before=str_replace('nt','Người thân',$before);
        $before=str_replace('sk','Sự kiện',$before);
        return $before;
    }else{
        return "";
    }
    
}
?>