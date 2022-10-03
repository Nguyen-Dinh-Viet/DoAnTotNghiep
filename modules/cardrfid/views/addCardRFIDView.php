<?php get_header() ?>
<?php get_sidebar() ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Tạo thông tin thẻ đăng kí ra-vào</h5>
                        <p class="m-b-0">Tạo thông tin thẻ ra-vào mới trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Thẻ ra-vào</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=account&action=addAccount">Tạo thông tin thẻ
                                ra-vào</a>
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
                                    <h5 class="card-title">Tạo thông tin thẻ ra-vào mới</h5>
                                </div>
                                <div class="card-block">
                                    <form method="POST">
                                        <!-- Số thẻ -->
                                        <div class="form-group">
                                            <label for="CardNumber">Số thẻ</label>
                                            <input id="CardNumber" type="text" name="CardNumber"
                                                value="<?php echo set_value('CardNumber') ?>" class="form-control"
                                                placeholder="Nhập số thẻ đăng kí" autocomplete="off" autofocus>
                                            <?php echo form_error('CardNumber') ?>
                                        </div>
                                        <!-- Ngày đăng kí thẻ -->
                                        <div class="form-group">
                                            <label for="DateSignCard">Ngày đăng kí thẻ</label>
                                            <input class="form-control" type="date" name="DateSignCard"
                                                id="DateSignCard" value="<?php echo set_value('DateSignCard') ?>">
                                            <?php echo form_error('DateSignCard') ?>
                                        </div>
                                        <!-- Biển số xe -->
                                        <!-- <div class="form-group">
                                            <label for="LicensePlates">Biển số xe</label>
                                            <input id="LicensePlates" type="text" name="LicensePlates"
                                                value="<?php echo set_value('LicensePlates') ?>" class="form-control"
                                                placeholder="Nhập biển số xe">
                                            <?php echo form_error('LicensePlates') ?>
                                        </div> -->
                                        <!-- Màu xe -->
                                        <!-- <div class="form-group">
                                            <label for="Color">Màu xe</label>
                                            <input id="Color" type="text" name="Color"
                                                value="<?php echo set_value('Color') ?>" class="form-control"
                                                placeholder="Nhập Màu xe">
                                            <?php echo form_error('Color') ?>
                                        </div> -->
                                        <!-- Thương hiệu -->
                                        <!-- <div class="form-group">
                                            <label for="Brand">Thương hiệu xe</label>
                                            <input id="Brand" type="text" name="Brand"
                                                value="<?php echo set_value('Brand') ?>" class="form-control"
                                                placeholder="Nhập thương hiệu xe">
                                            <?php echo form_error('Brand') ?>
                                        </div> -->
                                        <!-- Ngày đăng kí xe -->
                                        <!-- <div class="form-group">
                                            <label for="DateSignCar">Ngày đăng kí xe</label>
                                            <input class="form-control" type="date" name="DateSignCar" id="DateSignCar"
                                                value="<?php echo set_value('DateSignCar') ?>">
                                            <?php echo form_error('DateSignCar') ?>
                                        </div> -->
                                        <!-- Hình ảnh -->

                                        <!-- Button thêm mới -->
                                        <?php echo form_error('cardrfid') ?>
                                        <button type="submit" class="btn btn-success" name="btn-submit"
                                            id="btn-submit">Thêm mới</button>
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

<script>
document.querySelector("#CardNumber").value = "";
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#DateSignCard").value = today;
</script>