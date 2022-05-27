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
                        <h5 class="m-b-10">Tạo thông tin tiền tệ</h5>
                        <p class="m-b-0">Tạo thông tin tiền tệ mới trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Tiền tệ</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=currency&action=addCurrency">Tạo thông tin tiền tệ</a>
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
                                    <h5 class="card-title">Tạo thông tin tiền tệ mới mới</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                    <form  method="POST">
                                                <div class="form-group">
                                                    <label for="name">Tên tiền tệ</label>
                                                    <input id="name_currency" type="text" name="name_currency" value="<?php echo set_value('name_currency') ?>" class="form-control" placeholder="Nhập tên tiền tệ">
                                                    <?php echo form_error('name_currency')?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="des">Mô tả tiền tệ</label>
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