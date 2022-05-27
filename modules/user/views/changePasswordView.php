<?php get_header() ?>
<?php get_sidebar() ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Thông tin</h5>
                        <p class="m-b-0">Đổi mật khẩu cá nhân</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Tài khoản</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Đổi mật khẩu
                            </a>
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
                                    <h5 class="card-title">Đổi mật khẩu</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">

                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="old_password">Mật khẩu cũ</label>
                                            <input class="form-control" type="password" name="old_password" id="old_password" value="<?php set_value('old_password') ?>">
                                            <?php echo form_error('old_password') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password">Mật khẩu mới</label>
                                            <input class="form-control" type="password" name="new_password" id="new_password" value="<?php set_value('new_password') ?>">
                                            <?php echo form_error('new_password') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Xác nhận mật khẩu mới</label>
                                            <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="<?php set_value('confirm_password') ?>">
                                            <?php echo form_error('confirm_password') ?>
                                        </div>
                                        <?php echo form_error('password') ?>
                                        <button type="submit" class="btn btn-success" name="btn-update-pass" id="btn-update-pass">Cập nhật</button>
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