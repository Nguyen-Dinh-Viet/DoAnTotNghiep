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
                        <h5 class="m-b-10">Tàu</h5>
                        <p class="m-b-0">Quản lý vận chuyển </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Tàu</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Quản lý vận chuyển</a>
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
                                            <h5 style="margin-top:3px" class="card-title">Quản lý vận chuyển </h5>
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="card-block" style="padding-top:5px">

                                    
                                    <!-- Nội dung -->
                                    <div class="tab-content">
                                        <!-- form -->
                                        <div class="mb-2">
                                            <form  method="POST">
                                            <div class="mb-3" style="display: flex;justify-content: space-between;">
                                            <div style="display: grid" class="wp-input">
                                                    <label for="date">Ngày</label>
                                                    <input type="date" name="date" value="<?php echo set_value('date') ?>" class="form-control">
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="ship_id">Tàu</label>
                                                    <select value="<?php echo set_value('ship_id') ?>" id="ship_id" name="ship_id" class="form-control">
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
                                                <div style="display: grid" class="wp-input">
                                                    <label for="from_port">Cảng đi</label>
                                                    <input class="form-control" type="text" id="from_port" name="from_port" value="<?php echo set_value('from_port') ?>" placeholder="Tên cảng đi">
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="to_port">Cảng đến</label>
                                                    <input class="form-control" type="text" id="to_port" name="to_port" value="<?php echo set_value('to_port') ?>" placeholder="Tên cảng đến">
                                                </div> 
                                                <div style="display: grid" class="wp-input">
                                                    <label for="transport_company">Công ty vận chuyển</label>
                                                    <input class="form-control" type="text" id="transport_company" name="transport_company" value="<?php echo set_value('transport_company') ?>" placeholder="Tên công ty vận chuyển">
                                                </div>
                                               
                                            </div>
                                            <div style="display: flex;justify-content: space-between;">
                                            <div style="display: grid" class="wp-input">
                                                    <label for="goods">Hàng hóa</label>
                                                    <input class="form-control" type="text" id="goods" name="goods" value="<?php echo set_value('goods') ?>" placeholder="Tên hàng hóa">
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="quantity">Số lượng</label>
                                                    <input class="form-control" type="text" id="quantity" name="quantity" value="<?php echo set_value('quantity') ?>" placeholder="Số lượng">
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="currency">Tiền tệ</label>
                                                    <select name ="currency" id ="currency"  class="form-control" value ="<?php echo set_value('currency') ?>">
                                                    <?php
                                                            foreach ($currency as $item) {
                                                                # code...
                                                                ?>  
                                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="price">Đơn giá</label>
                                                    <input class="form-control" type="text" id="price" name="price" value="<?php echo set_value('price') ?>" placeholder="Đơn giá">
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="money">Thành tiền</label>
                                                    <input class="form-control" type="text" id="money" name="money" value="<?php echo set_value('money') ?>" placeholder="Thành tiền">
                                                </div>
                                                <div style="display: grid" class="wp-input">
                                                    <label for="note">Ghi chú</label>
                                                    <input class="form-control" type="text" id="note" name="note" value="<?php echo set_value('note') ?>" placeholder="Ghi chú">
                                                </div>
                                                <div>
                                                    <p style="margin-bottom: 42px"></p>
                                                    <button type="submit" class="btn btn-success" name="btn-submit" id="btn-submit">Thêm</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                        <p class="error"><?php echo $error ?></p>
                                        <!-- <div>
                                            <form method="POST">
                                            <div class="form-group mb-4 col-md-6 style-datepicker">
                                             <div class="datepicker date input-group p-0 shadow-sm mr-3">
                                             <input type="text" name="dateSearch" value="<?php echo $dateSearch ?>" placeholder="Choose a reservation date" class="form-control py-4 px-4" id="reservationDate">
                                            <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>
                                             </div>
                                             <button type="submit" class="btn btn-success" name="btn-search" id="btn-search">Tìm kiếm</button>
                                         </div>
                                        
                                            </form>
                                            
                                        </div> -->
                                   <!-- DEnd ate Picker Input -->
                                        <!-- end form -->
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Ngày</th>
                                                        <th>Tên tàu</th>
                                                        <th>Cảng đi</th>
                                                        <th>Cảng đến</th>
                                                        <th>Công ty vận chuyển</th>
                                                        <th>Hàng hóa</th>
                                                        <th>Số lượng</th>
                                                        <th>Tiền tệ</th>
                                                        <th>Đơn giá</th>
                                                        <th>Thành tiền</th>
                                                        <th>Ghi chú</th>
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
                                                            <td><?php echo $item['name'] ?></td>
                                                            <td><?php echo $item['fromPort'] ?></td>
                                                            <td><?php echo $item['toPort'] ?></td>
                                                            <td><?php echo $item['transportCompany'] ?></td>
                                                            <td><?php echo $item['goods'] ?></td>
                                                            <td><?php echo $item['quantity'] ?></td>
                                                            <td><?php echo $item['currency_name'] ?></td>
                                                            <td><?php echo $item['price'] ?></td>
                                                            <td style="font-weight:600"><?php echo number_format($item['money'], 2, ',', ' ') ?></td>
                                                            <td><?php echo $item['note'] ?></td>
                                                            <td>
                                                                <span style="cursor: pointer" class="mr-2 change_transport" title="Sửa" data-id="<?php echo $item['id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                                <a title="Xóa" href="?mod=ship&action=deleteManageShip&id=<?php echo ($item['id'])?>" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                                <div class="modal fade" id="modal-info-transport">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Chỉnh sửa thông tin quản lý tàu thuyền
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
                                                                <label for="change_ship_id">Tàu</label>
                                                                    <select value="<?php echo set_value('change_ship_id') ?>" id="change_ship_id" name="change_ship_id" class="form-control">
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
                                                                <div class="wp-input form-group">
                                                                    <label for="change_from_port">Cảng đi</label>
                                                                    <input class="form-control" type="text" id="change_from_port" name="change_from_port" value="<?php echo set_value('change_from_port') ?>" placeholder="Tên cảng đi">
                                                                </div>
                                                                <p id="error_money" class="error"><?php echo form_error('money') ?></p>
                                                                <div class="form-group wp-input">
                                                                    <label for="change_to_port">Cảng đến</label>
                                                                    <input class="form-control" type="text" id="change_to_port" name="change_to_port" value="<?php echo set_value('change_to_port') ?>" placeholder="Tên cảng đến">
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="change_transport_company">Công ty vận chuyển</label>
                                                                     <input class="form-control" type="text" id="change_transport_company" name="change_transport_company" value="<?php echo set_value('change_transport_company') ?>" placeholder="Tên công ty vận chuyển">
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                     <label for="change_goods">Hàng hóa</label>
                                                                    <input class="form-control" type="text" id="change_goods" name="change_goods" value="<?php echo set_value('change_goods') ?>" placeholder="Tên hàng hóa">
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="change_quantity">Số lượng</label>
                                                                    <input class="form-control" type="text" id="change_quantity" name="change_quantity" value="<?php echo set_value('change_quantity') ?>" placeholder="Số lượng">
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="change_currency">Tiền tệ</label>
                                                                    <select name ="change_currency" id ="change_currency"  class="form-control" value ="<?php echo set_value('currency') ?>">
                                                                    <?php
                                                                            foreach ($currency as $item) {
                                                                                # code...
                                                                                ?>  
                                                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="change_price">Đơn giá</label>
                                                                    <input class="form-control" type="text" id="change_price" name="change_price" value="<?php echo set_value('change_price') ?>" placeholder="Đơn giá">
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="change_money">Thành tiền</label>
                                                                    <input class="form-control" type="text" id="change_money" name="change_money" value="<?php echo set_value('change_money') ?>" placeholder="Thành tiền">
                                                                </div>
                                                                <div class="wp-input form-group">
                                                                    <label for="note">Ghi chú</label>
                                                                    <input class="form-control" type="text" id="change_note" name="change_note" value="<?php echo set_value('change_note') ?>" placeholder="Ghi chú">
                                                                </div>
                                                                <p id="error_manage" class="error"></p>
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