<?php require_once('../lib/db.php'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3">Welcome !</h4> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h5 class="mt-0 font-14 mb-3 ">Account</h5>
                                    <div class="head">
                                    <button class="btn_add" type="button" onclick="show_hide_frm_create()">Mới</button>
                                    </div>
                                    <div class="table-responsive">

                                        <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                                            <thead>
                                                <tr>
                                                    <th>Họ tên</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tên đăng nhập</th>
<th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                foreach($lst_acc as $value) { ?>
                                                <tr>
                                                    <td>
                                                    <?php echo $value['name'];?>
                                                    </td>

                                                    <td>
                                                    <?php echo $value['sdt'];?>
                                                    </td>

                                                    <td>
                                                    <?php echo $value['user'];?>
                                                    </td>
                                                    <td>
                                    <button class="btn_del"  action="" type="button" onclick="xoa_obj(<?php echo $value['id_us'] ?>)">Xóa</button>
                                    <button class="btn_set"  action="" type="button" onclick="">Sửa</button>
                                                    </td>
                                                    
                                                </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row create_acc">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h5 class="mt-0 font-14 mb-3">Thông tin tài khoản</h5>
                                    <form class="frm_account_inf" action="process/pro_account.php" method="POST">
                                        <div class="frm_item">
                                            <label for="name">Tên</label> <br>
                                            <input id="name" name="name" type="text">
                                        </div>
                                        <div class="frm_item">
                                            <label for="sdt">Số điện thoại</label> <br>
                                            <input id="sdt" name="sdt" type="text">
                                        </div>
                                        <div class="frm_item">
                                            <label for="usn">Tên đăng nhập</label> <br>
                                            <input id="usn" name="usn" type="text"></div>
                                        <div class="frm_item">
                                            <label for="pass">Mật khẩu</label> <br>
                                            <input id="pass" name="pass" type="text"></div>
                                        <div class="frm_item">
                                            <label for="pass_cf">Xác Nhận mật khẩu</label> <br>
                                            <input id="pass_cf" name="pass_cf" type="text"></div>

                                            <button class="btn_confirm" type="submit" >Xác nhận</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                                               