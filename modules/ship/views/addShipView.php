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
                        <h5 class="m-b-10">Tạo thông tin tàu</h5>
                        <p class="m-b-0">Tạo thông tin tàu mới trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Tàu</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=ship&action=addShip">Tạo thông tin tàu</a>
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
                                    <h5 class="card-title">Tạo thông tin tàu mới</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                    <form method="POST">
                                       

                                                <div class="form-group">
                                                    <label for="shipName">Tên tàu</label>
                                                    <input id="name_ship" type="text" name="name_ship" value="<?php echo set_value('name_ship') ?>" class="form-control" placeholder="Nhập tên tàu">
                                                    <?php echo form_error('name_ship') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="type_ship">Loại tàu</label>
                                                    <input id="type_ship" type="text" name="type_ship" value="<?php echo set_value('type_ship') ?>" class="form-control" placeholder="Nhập loại tàu">
                                                    <?php echo form_error('type_ship') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="number">Mã hiệu</label>
                                                    <input id="number" type="text" name="number" value="<?php echo set_value('number') ?>" class="form-control" placeholder="Nhập số hiệu tàu">
                                                    <?php echo form_error('number') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="volume">Trọng tải toàn phần</label>
                                                    <input id="volume" type="number" min="0" max="1000" name="volume" value="<?php echo set_value('volume') ?>" class="form-control" placeholder="Nhập trọng tải toàn phần của tàu">
                                                    <?php echo form_error('volume') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateStart">Ngày bắt đầu</label>
                                                    <input id="dateStart" type="date" name="dateStart" value="<?php echo set_value('dateStart') ?>" class="form-control">
                                                    <?php echo form_error('dateStart') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="des">Mô tả tàu</label>
                                                    <input id="des" type="textarea" name="des" value="<?php echo set_value('des') ?>" class="form-control" placeholder="Nhập mô tả">
                                                    <?php echo form_error('des') ?>
                                                </div>

                                                <?php echo form_error('account') ?>

                                           
                                        <button type="submit" class="btn btn-success" name="btn-submit" id="btn-submit">Thêm mới</button>
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