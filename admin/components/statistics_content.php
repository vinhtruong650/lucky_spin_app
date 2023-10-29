<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Thống kê quà hằng ngày</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="mt-0">
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                        </div>
                        <!-- <div class="col-sm-12 col-md-2">
                            <div id="datatable-buttons_filter" class="dataTables_filter"><label>Ngày:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-buttons"></label></div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%; text-align:center;" role="grid" aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 120.2px;text-align:left;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Ngày</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Office: activate to sort column ascending">Nồi chiên</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Age: activate to sort column ascending">Sổ tay</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Start date: activate to sort column ascending">Túi</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Salary: activate to sort column ascending">Voucher 5%</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Salary: activate to sort column ascending">Voucher 10%</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    foreach($lstLogs as $g){
                                    ?>
                                    <tr role="row" class="even">
                                        <td class="sorting_1" tabindex="0" style="text-align:left;"><?php echo $g['time_create']; ?></td>
                                        <td><?php echo $g['gift_1']; ?> / 1</td>
                                        <td><?php echo $g['gift_2']; ?> / 12</td>
                                        <td><?php echo $g['gift_3']; ?> / 12</td>
                                        <td><?php echo $g['gift_4']; ?> / 200</td>
                                        <td><?php echo $g['gift_5']; ?> / 300</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end row -->

</div>