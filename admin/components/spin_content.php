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
        <div class="col-sm-3 mb-2">
            <form class="app-search" method="post">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="date" required name="search_date" class="form-control" placeholder="Search...">
                        <div class="">
                            <button class="btn btn-primary" name="btn_search" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <form class="app-search" method="post">
            <div class="app-search-box">
                <div style="display: flex;align-items: center;" class="input-group">
                    <div class="checkbox checkbox-primary checkbox-circle">
                        <input name="stt" value="1" id="checkbox-9" type="checkbox">
                        <label for="checkbox-9">
                            Thành công
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary checkbox-circle ml-2">
                        <input name="stt" value="2" id="checkbox-8" type="checkbox">
                        <label for="checkbox-8">
                            Thất bại
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary checkbox-circle ml-2">
                        <input name="stt" value="0" id="checkbox-7" type="checkbox">
                        <label for="checkbox-7">
                            Mới tạo
                        </label>
                    </div>
                    <div class="ml-3">
                        <button class="btn btn-primary" name="btn_checked" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
                                <th>Quà 1</th>
                                <th>Quà 2</th>
                                <th>Quà 3</th>
                                <th>Quà 4</th>
                                <th>Quà 5</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>

                        <tbody>
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
                                <td><?= $Spin['logs_state'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>