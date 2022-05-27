<?php
get_header()
?>
<?php get_sidebar() ?>

<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Sổ thống kê</h5>
                        <p class="m-b-0">Sổ thống kê thu chi </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Sổ chính</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Sổ thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" >
                                    <div style="display:flex;justify-content: space-between;">
                                        <div class="d-flex" style="margin-top:0.5rem">
                                            <h5 style="margin-top:3px" class="card-title">Sổ thống kê thu chi: </h5>
                                            <p style="font-weight: 700;color: #448aff;font-size:18px;margin-bottom:0px"><?php echo ($account['name'] . ' - ' . $account['bank_name'] . ' - ' . $account['currency_name']) ?> </p>
                                            <p style="margin-bottom: 0px;font-size: 16px;margin-top: 2px;margin-left: 20px;"><?php echo ("( " . $day . " )") ?></p>
                                        </div>

                                        <div>
                                            <!-- <form method ="POST">
                                            <button type="submit" class="btn btn-info" name ="btnExport">Xuất file</button>
                                        </form> -->
                                            <a type="" target="_blank" class="btn btn-info" download ="ke_toan_mau.xlsx" href="./libraries/ke_toan_mau.xlsx">Xuất file mẫu</a>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <!-- <form method="POST" enctype="multipart/form-data"> -->
                                            <input type ="file" name = "file_upload" id ="file_upload" >
                                            <button class="btn btn-info" type="submit" id ="btn-import" name ="btn-import">Nhập file</button>
                                        <!-- </form> -->
                                    </div>
                                 
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block" style="padding-top:5px">


                                    <!-- Nội dung -->
                                    <div class="tab-content">
                                        <div style="display: flex;justify-content: space-between; margin-top: 1rem;">
                                            <p>Số tiền ban đầu: <span style="font-size: 18px;color: orange;font-weight: 600;"><?php echo (number_format($account['amount'], 2, ',', ' ') . " " . $account['currency_name'])  ?></span> </p>
                                            <p>Tổng thu : <span style="font-size: 18px;color: #34e734;font-weight: 600;"><?php echo (number_format($sum_collect['sum'], 2, ',', ' ') . " " . $account['currency_name'])  ?></span> </p>
                                            <p>Tổng chi : <span style="font-size: 18px;color: red;font-weight: 600;"><?php echo (number_format($sum_spend['sum'], 2, ',', ' ') . " " . $account['currency_name'])  ?></span> </p>
                                            <p>Số dư tạm tính: <span style="font-size: 18px;color: #04f;font-weight: 600;"><?php echo (number_format($account['amount'] + $sum_collect['sum'] - $sum_spend['sum'], 2, ',', ' ') . " " . $account['currency_name']) ?></span></p>
                                        </div>
                                        <!-- form -->
                                        <div class="mb-2">

                                            <form style="display: flex;justify-content: space-between;" method="POST">
                                                <div style="display: grid" class="wp-input">
                                                    <label for="date">Ngày</label>
                                                    <input type="date" name="date" value="<?php echo set_value('date') ?>" class="form-control">
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="cat_id">Loại thu chi</label>
                                                    <select value="<?php echo set_value('cat_id') ?>" id="cat_id" name="cat_id" class="form-control">
                                                        <?php
                                                        foreach ($category as $item) {
                                                            # code...?
                                                        ?>
                                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="money">Số tiền</label>
                                                    <input class="form-control" type="text" id="money" name="money" value="<?php echo set_value('money') ?>" placeholder="Số tiền">
                                                </div>
                                                <!-- <div style="display: grid" class="wp-input">
                                                    <label for="money_2">Chi</label>
                                                    <input class="form-control" type="text" id="money_2" name="money_2" value="<?php echo set_value('money_2') ?>" placeholder="Số tiền">
                                                </div> -->
                                                <div style="display: grid" class="wp-input change-input-ajax">
                                                    <label for="ship_id">Tàu</label>
                                                    <select value="" id="ship_id" name="ship_id" class="form-control">
                                                        <option value="0">--</option>
                                                        <?php
                                                        foreach ($list_ship as $item) {
                                                            # code...?
                                                        ?>
                                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div style="display: grid" class="wp-input change-input-ajax">
                                                    <label for="shareholder_id">Cổ đông</label>
                                                    <select value="" id="shareholder_id" name="shareholder_id" class="form-control">
                                                        <option value="0">--</option>
                                                        <!-- <?php
                                                                foreach ($list_shareholder as $item) {
                                                                    # code...?
                                                                ?>
                                                            <option value="<?php echo $item['id'] ?>"><?php echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></option>
                                                        <?php
                                                                }
                                                        ?> -->

                                                    </select>
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="des">Mô tả</label>
                                                    <input class="form-control" type="text" id="des" name="des" value="<?php echo set_value('des') ?>" placeholder="Mô tả">
                                                </div>
                                                <div>
                                                    <p style="margin-bottom: 42px"></p>
                                                    <button type="submit" class="btn btn-success" name="btn-submit" id="btn-submit">Thêm</button>
                                                </div>

                                            </form>
                                        </div>
                                        <div>
                                            <form method="POST">
                                            <div class="form-group mb-4 col-md-6 style-datepicker">
                                             <div class="datepicker date input-group p-0 shadow-sm mr-3">
                                             <input type="text" name="dateSearch" value="<?php echo $dateSearch ?>" placeholder="Choose a reservation date" class="form-control py-4 px-4" id="reservationDate">
                                            <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>
                                             </div>
                                             <button type="submit" class="btn btn-success" name="btn-search" id="btn-search">Tìm kiếm</button>
                                         </div><!-- DEnd ate Picker Input -->
                                            </form>
                                            
                                        </div>
                                  
                                        <!-- end form -->
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Ngày</th>
                                                        <th>Loại thu chi</th>
                                                        <th>Số tiền</th>
                                                        <th>Tàu</th>
                                                        <th>Cổ đông</th>
                                                        <th>Mô tả</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($data as $item) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $i ?></th>
                                                            <td><?php $date = date_create($item['date']);
                                                                echo (date_format($date, 'd-m-Y'));  ?></td>
                                                            <td><?php echo $item['cat_name'] ?></td>
                                                            <td class="<?php if($item['spend'] == 0) {echo("style-spend");} else echo("style-pay"); ?>"><?php echo number_format($item['money'], 2, ',', ' ') ?></td>
                                                            <td><?php if ($item['name_ship'] != null) echo $item['name_ship'] ?></td>
                                                            <td><?php if ($item['user_fname'] != null) echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></td>
                                                            <td><?php echo $item['des'] ?></td>
                                                            <td>
                                                                <span style="cursor: pointer" class="mr-2 change_ledger" title="Sửa" data-id="<?php echo $item['id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                                <a title="Xóa" href="?mod=ledgers&action=deleteAccountLedgers&id=<?php echo ($item['id']) ?>&account_id=<?php echo ($account['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $i = $i + 1;
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>




                                    </div>
                                </div>

                                <!-- Cấu trưc modal -->
                                <div class="modal fade" id="modal-info-ledger">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Chỉnh sửa thông tin thu chi
                                                </h5>
                                                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <!-- and modal-header	 -->
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form method="POST">
                                                                <input type="text" class="d-none" name="change_id" value="" id="change_id">
                                                                <div class="wp-input form-group">
                                                                    <label for="change_date">Ngày</label>
                                                                    <input type="date" id="change_date" name="change_date" value="" class="form-control">
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="change_cat_id">Loại thu chi</label>
                                                                    <select value="" id="change_cat_id" name="change_cat_id" class="form-control">
                                                                        <?php
                                                                        foreach ($category as $item) {
                                                                            # code...?
                                                                        ?>
                                                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="change_money">Số tiền</label>
                                                                    <input class="form-control" type="text" id="change_money" name="change_money" value="" placeholder="Số tiền">
                                                                </div>
                                                                <!-- <div class="wp-input form-group">
                                                                    <label for="change_money_2">Chi</label>
                                                                    <input class="form-control" type="text" id="change_money_2" name="change_money_2" value="" placeholder="Số tiền">
                                                                </div> -->
                                                                <p id="error_money" class="error"><?php echo form_error('money') ?></p>
                                                                
                                                                <div class="form-group wp-input change-input-ajax">
                                                                    <label for="change_ship_id">Tàu</label>
                                                                    <select value="" id="change_ship_id" name="change_ship_id" class="form-control">
                                                                        <option value="0">--</option>
                                                                        <?php
                                                                        foreach ($list_ship as $item) {
                                                                            # code...?
                                                                        ?>
                                                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group wp-input change-input-ajax">
                                                                    <label for="change_shareholder_id">Cổ đông</label>
                                                                    <select value="" id="change_shareholder_id" name="change_shareholder_id" class="form-control">
                                                                        <option value="0">--</option>
                                                                        <!-- <?php
                                                                                foreach ($list_shareholder as $item) {
                                                                                    # code...?
                                                                                ?>
                                                                            <option value="<?php echo $item['id'] ?>"><?php echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></option>
                                                                        <?php
                                                                                }
                                                                        ?> -->

                                                                    </select>
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="change_des">Mô tả</label>
                                                                    <input class="form-control" type="text" id="change_des" name="change_des" value="" placeholder="Mô tả">
                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end modal-body -->
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                <button class="btn btn-primary btn-save">Lưu</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end-modal -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
<?php get_footer() ?>