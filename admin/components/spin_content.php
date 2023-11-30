<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Cấu hình quà tặng</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <?php 
        $isSP=false;
        if(isset($_SESSION['username'])&& $_SESSION['username']=='spadmin'){
        $isSP = true;
    } ?>

    <div class="row">
        <div class="col-sm-8 mb-2">
            <form class="app-search frm_search_spin row" method="get">
                <div class="col-sm-4">
                    <input type="date"
                        value="<?php if(isset($_GET['search_date'])&&$_GET['search_date']!=""){echo $_GET['search_date']; } ?>"
                        name="search_date" class="form-control" placeholder="Search...">
                </div>
                <div class="col-sm-8">
                    <div class="radio_group">
                        <div class="ml-2">
                            <input name="stt" <?php if(isset($_GET['stt'])&&$_GET['stt']=="1"){ echo "checked";} ?>
                                value="1" id="checkbox-9" type="radio">
                            <label for="checkbox-9">
                                Thành công
                            </label>
                            <input name="stt" <?php if(isset($_GET['stt'])&&$_GET['stt']=="0"){ echo "checked";} ?>
                                value="0" id="checkbox-7" type="radio">
                            <label for="checkbox-7">
                                Mới tạo
                            </label>
                            <input name="stt" <?php if(isset($_GET['stt'])&&$_GET['stt']=="2"){ echo "checked";} ?>
                                value="2" id="checkbox-8" type="radio">
                            <label for="checkbox-8">
                                Thất bại
                            </label>
                            <input name="stt"
                                <?php if(isset($_GET['stt'])&&$_GET['stt']=="3"){ echo "checked";} if($isFirst) echo "checked"; ?>
                                value="3" id="checkbox-8" type="radio">
                            <label for="checkbox-8">
                                Tất cả
                            </label>
                        </div>
                        <div class="ml-3">
                            <button class="btn btn-primary" name="btn_search" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>



            </form>
        </div>
        <div class="col-sm-4 export_exc">
            <button class="btn btn-success export_exc_btn" name="" type="submit">
                <b>Xuất excel</b>
            </button>
        </div>
        <div class="col-sm-12">
            <b>
                <p>Có: <?= count($lstSpin); ?> kết quả</p>
            </b>
        </div>
        <div class="col-sm-12">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Danh sách lượt quay</h5>
                <div class="table-responsive">
                    <table id="lstSL" class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên KH</th>
                                <th>Số lượt quay</th>
                                <th>Số mộc</th>
                                <th>Số seri vé</th>
                                <th>Thời gian tạo</th>
                                <th>Nồi chiên quay may mắn</th>
                                <th>Sổ tay</th>
                                <th>Túi</th>
                                <th>Voucher 5%</th>
                                <th>Voucher 10%</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                if(isset($lstSpin)){
                            ?>
                            <?php foreach($lstSpin as $Spin){?>
                            <tr>
                                <td><?= $Spin['id_log'] ?></td>
                                <td><?= $Spin['cus_name'] ?></td>
                                <td><?= $Spin['spin_quantity'] ?></td>
                                <td><?= $Spin['ticket_stamp'] ?></td>
                                <td><?= $Spin['ticket_seri'] ?></td>
                                <td><?= $Spin['time_create'] ?></td>
                                <td><?= $Spin['gift_1'] ?></td>
                                <td><?= $Spin['gift_2'] ?></td>
                                <td><?= $Spin['gift_3'] ?></td>
                                <td><?= $Spin['gift_4'] ?></td>
                                <td><?= $Spin['gift_5'] ?></td>
                                <?php if($Spin['logs_state']=="0") {
                                    if($isSP){
                                        echo "<td id=".$Spin['id_log']." class='text-danger'>Mới tạo</td><td><button class='btn btn-warning btn_success' data-stt=1 value=".$Spin['id_log']." data-toggle='modal' data-target='#Modal_success' >Huỷ lượt</button><td>";
                                    }else{
                                        echo "<td id=".$Spin['id_log']." class='text-danger'>Mới tạo</td><td><button class='btn btn-danger btn_fail' value=".$Spin['id_log']." data-toggle='modal' data-target='#myModal' >Huỷ lượt</button><td>";
                                    }
                                } 
                                else if($Spin['logs_state']=="1"){
                                    if($isSP){
                                        echo "<td id=".$Spin['id_log']." class='text-primary'>Thành công</td><td><button class='btn btn-warning btn_success' data-stt=1 value=".$Spin['id_log']." data-toggle='modal' data-target='#Modal_success' >Huỷ lượt</button><td>";
                                    }else{
                                        echo "<td id=".$Spin['id_log']." class='text-primary'>Thành công</td><td><button class='btn btn-danger btn_fail' value=".$Spin['id_log']." data-toggle='modal' data-target='#myModal' >Huỷ lượt</button><td>";
                                    }
                                }
                                else {
                                    if($isSP){
                                        echo "<td id=".$Spin['id_log']." class='text-danger'>Thất bại</td><td><button class='btn btn-primary btn_success' data-stt=2 value=".$Spin['id_log']." data-toggle='modal' data-target='#Modal_success' >Khôi phục</button><td>";
                                    }else{
                                        echo "<td class='text-warning'>Thất bại</td><td><td>";
                                    }
                                }
                                ?>
                            </tr>
                            <?php
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Có thể lượt quay này đang được thực hiện tại sự kiện, bạn có chắc muốn huỷ hay không?
                    <br>Nhập mã xác nhận: 
                    <b></b>
                    <br>
                    <input style="width:100%;height:2rem" type="text">
                    <p class="error_code"></p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" value="" class="btn btn-primary btn_agree">Có</button>
                    <button type="button" class="btn btn-danger btn_del" data-dismiss="modal">Không</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_success">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Bạn có chắc muốn cập nhật lượt quay này?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" value="" class="btn btn-primary btn_agree_sc">Có</button>
                    <button type="button" class="btn btn-danger btn_del_sc" data-dismiss="modal">Không</button>
                </div>

            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<style>
.radio_group {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: end;
}

.export_exc {
    display: flex;
    justify-content: end;
}

.d-none-btn-update {
    display: none;
}
.error_code{
    color:red;
}
</style>