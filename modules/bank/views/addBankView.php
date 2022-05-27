<?php
get_header()
?>
<?php
get_sidebar()
?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Tạo thông tin ngân hàng</h5>
                        <p class="m-b-0">Tạo thông tin ngân hàng mới trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Ngân hàng</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=bank&action=addBank">Tạo thông tin ngân hàng</a>
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
                                <div class="card-header">
                                    <h5 class="card-title">Tạo thông tin ngân hàng mới</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                    <form  method="POST">
                                                <div class="form-group">
                                                    <label for="name_bank">Tên ngân hàng</label>
                                                    <input id="name_bank" type="text" name="name_bank" value="<?php echo set_value('name_bank') ?>" class="form-control" placeholder="Nhập tên ngân hàng">
                                                    <?php echo form_error('name_bank')?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Địa chỉ phòng giao dịch làm việc</label>
                                                    <input id="address" type="text" name="address" value="<?php echo set_value('address') ?>" class="form-control" placeholder="Nhập địa chỉ phòng giao dịch làm việc">
                                                    <?php echo form_error('address')?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="des">Mô tả ngân hàng</label>
                                                    <input id="des" type="textarea" name="des" value="<?php echo set_value('des') ?>" class="form-control" placeholder="Nhập mô tả">
                                                    <?php echo form_error('des')?>
                                                </div>
                                        
                                        <?php echo form_error('account')?>
                                        <button type="submit" class ="btn btn-success" name="btn-submit" id="btn-submit">Thêm mới</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php get_footer() ?>