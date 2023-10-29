<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Quản lí tài khoản</h4>

            </div>
        </div>
    </div>
    <!-- end row -->

    

    <div class="row">
        <div class="col-lg-6">
            <div class="mt-5 mb-5">
                <h4 class="header-title mb-3">Tài khoản</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                        <input type="text" required class="form-control" id="us" name="us" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật khẩu</label>
                        <input type="password" required class="form-control" id="pass" name="pass" placeholder="">
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox1" type="checkbox">
                            <label for="checkbox1">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <button type="submit" name="btn_add" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Danh sách tài khoản</h5>
                <div class="table-responsive">
                    <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th>
                                </th>
                                <th>Tài khoản</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($lstAcc as $Acc){ ?>
                            <tr>
                                <td></td>
                                <td>
                                    <?= $Acc['user'] ?>
                                </td>
                                <td>
                                    <?php if($Acc['user']!="admin") {  ?>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?= $Acc['user'] ?>" name="us_edit">
                                        <button style="width: 5rem" type="submit" name="<?php echo $Acc['status']==1?"btn_nohide":"btn_hide" ?>" class="btn btn-primary"><?php echo $Acc['status']==1?"Hiện":"Ẩn" ?></button>
                                    </form>
                                    <?php }?>
                                </td>

                            </tr>
                                <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


</div>