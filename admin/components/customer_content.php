<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Quản lí khách hàng</h4>

            </div>
        </div>
    </div>
    <!-- end row -->



    <div class="row">
        <div class="col-sm-3 mb-2">
            <form class="app-search" action="" method="post">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="input" required class="form-control" name="search_bp" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" name="btn_search" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-9 export_exc">
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
                                <th>Tên KH</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Biết đến</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($lstSpin as $Spin){?>
                            <tr>
                                <td><?= $Spin['cus_name'] ?></td>
                                <td><?= $Spin['cus_phone'] ?></td>
                                <td><?= $Spin['cus_add'] ?></td>
                                <td><?= chuanHoa($Spin['channels']) ?></td>
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
<style>
    .export_exc{
        display: flex;
    justify-content: end;
    }
</style>