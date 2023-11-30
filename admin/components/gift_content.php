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



    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Cơ cấu giải thưởng</h5>
                <div class="table-responsive">
                    <table id="lstSL" class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th>Quà</th>
                                <th>Tổng SL</th>
                                <th>SL ngày thường</th>
                                <th>SL T7</th>
                                <th>Tổng SL đã tặng</th>
                                <th>Khoá quà tặng</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($awa as $key=>$val){?>
                            <tr>
                                <td><?= $val ?></td>
                                <td><?= $lstGift['gift'.($key+1).'_quantity'] ?></td>
                                <td><?= $lstGift['gift'.($key+1).'_daily'] ?></td>
                                <td><?= $lstGift['gift'.($key+1).'_sat'] ?></td>
                                <td><?= $lstGift['gift'.($key+1).'_used'] ?></td>
                                <td>
                                <?php if($lstGift['gift'.($key+1).'_status']==0){?>
                                    <span class="text-primary">
                                        Đang mở
                                    </span>
                                <button style="width: 5rem" type="button" data="<?=$key+1?>" func="lock"
                                            name="btn_stt"
                                            class="btn btn-primary">Khoá</button>
                                <?php }else{ ?>
                                    <span class="text-danger">
                                        Đang khoá
                                    </span>
                                <button style="width: 5rem" type="button" data="<?=$key+1?>" func="unlock"
                                            name="btn_stt"
                                            class="btn btn-primary">Mở</button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Thống kê quà chờ quay (đang quay)</h5>
                <div class="table-responsive">
                    <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>NỒI CHIÊN Quay may mắn</th>
                                <th>Sổ tay</th>
                                <th>Túi</th>
                                <th>Voucher 5%</th>
                                <th>Voucher 10%</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($lstWait as $Quan){ ?>
                            <tr>
                                <td><?= $Quan['Ngay'] ?></td>
                                <td><?= $Quan['SL1'] ?></td>
                                <td><?= $Quan['SL2'] ?></td>
                                <td><?= $Quan['SL3'] ?></td>
                                <td><?= $Quan['SL4'] ?></td>
                                <td><?= $Quan['SL5'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Thống kê quà tặng theo ngày</h5>
                <button class="btn btn-success export_exc_btn mb-3" name="" type="submit">
                <b>Xuất excel</b>
            </button>
                <div class="table-responsive">
                    <table id='tbOfDay' class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>NỒI CHIÊN Quay may mắn</th>
                                <th>Sổ tay</th>
                                <th>Túi</th>
                                <th>Voucher 5%</th>
                                <th>Voucher 10%</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($lstQuan as $Quan){ ?>
                            <tr>
                                <td><?= $Quan['Ngay'] ?></td>
                                <td><?= $Quan['SL1'] ?></td>
                                <td><?= $Quan['SL2'] ?></td>
                                <td><?= $Quan['SL3'] ?></td>
                                <td><?= $Quan['SL4'] ?></td>
                                <td><?= $Quan['SL5'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>