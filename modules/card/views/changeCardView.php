<?php get_header() ?>
<?php get_sidebar() ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Chỉnh sửa thông tin thẻ đăng kí</h5>
                        <p class="m-b-0">Chỉnh sửa thông tin thẻ đăng kí ra-vào trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Thẻ đăng kí ra-vào</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?mod=bank&action=addBank">Chỉnh sửa thông tin thẻ ra-vào</a>
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
                                    <h5 class="card-title">Chỉnh sửa thông tin thẻ ra-vào</h5>
                                </div>
                                <div class="card-block">
                                    <form method="POST">
                                        <!-- Số thẻ -->
                                        <div class="form-group">
                                            <label for="CardNumber">Số thẻ</label>
                                            <input id="CardNumber" type="text" name="CardNumber"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $card['CardNumber']; ?>"
                                                class="form-control" placeholder="Nhập số thẻ đăng kí">
                                            <?php echo form_error('CardNumber') ?>
                                        </div>
                                        <!-- Ngày đăng kí thẻ -->
                                        <div class="form-group">
                                            <label for="DateSignCard">Ngày đăng kí thẻ</label>
                                            <input class="form-control" type="date" name="DateSignCard"
                                                id="DateSignCard"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $card['DateSignCard']; ?>">
                                            <?php echo form_error('DateSignCard') ?>
                                        </div>
                                        <!-- Biển số xe -->
                                        <div class="form-group">
                                            <label for="LicensePlates">Biển số xe</label>
                                            <input id="LicensePlates" type="text" name="LicensePlates"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $card['LicensePlates']; ?>"
                                                class="form-control" placeholder="Nhập biển số xe">
                                            <?php echo form_error('LicensePlates') ?>
                                        </div>
                                        <!-- Màu xe -->
                                        <div class="form-group">
                                            <label for="Color">Màu xe</label>
                                            <input id="Color" type="text" name="Color"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $card['Color']; ?>"
                                                class="form-control" placeholder="Nhập Màu xe">
                                            <?php echo form_error('Color') ?>
                                        </div>
                                        <!-- Thương hiệu -->
                                        <div class="form-group">
                                            <label for="Brand">Thương hiệu xe</label>
                                            <input id="Brand" type="text" name="Brand"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $card['Brand']; ?>"
                                                class="form-control" placeholder="Nhập thương hiệu xe">
                                            <?php echo form_error('Brand') ?>
                                        </div>
                                        <!-- Ngày đăng kí xe -->
                                        <div class="form-group">
                                            <label for="DateSignCar">Ngày đăng kí xe</label>
                                            <input class="form-control" type="date" name="DateSignCar" id="DateSignCar"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $card['DateSignCar']; ?>">
                                            <?php echo form_error('DateSignCar') ?>
                                        </div>
                                        <!-- Hình ảnh -->

                                        <!-- Button thêm mới -->
                                        <?php echo form_error('bank') ?>
                                        <button type="submit" class="btn btn-success" name="btn-update"
                                            id="btn-update">Cập nhật</button>
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