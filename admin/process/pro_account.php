<?php
require_once('../lib/db.php');

    $lst_acc = DP::run_query('SELECT `id_us`,`name`,`sdt`,`user` FROM `user`  WHERE `status`=1',[],2);
    if(isset($_POST['btn_del']))
{
    $del = DP::run_query('UPDATE `user` SET `status`=0 WHERE `id_us`=?' ,[$_POST['btn_del']],1);

}
if(isset($_POST['name']))
{
$new=DP::run_query('INSERT INTO `user` VALUES (4,?,?,?,?,1)',[$_POST['name'],$_POST['sdt'],$_POST['usn'],$_POST['pass']],1);
}
?>
