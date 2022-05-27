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
                        <h5 class="m-b-10">Tạo thông tin danh mục</h5>
                        <p class="m-b-0">Tạo thông tin danh mục mới trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Danh mục</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=category&action=addCategory">Tạo thông tin danh mục</a>
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
                                    <h5 class="card-title">Tạo thông tin danh mục mới</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                    <form  method="POST">
                                                <div class="form-group">
                                                    <label for="name_category">Tên loại thu chi</label>
                                                    <input id="name_category" type="text" name="name_category" value="<?php echo set_value('name_category') ?>" class="form-control" placeholder="Nhập tên danh mục">
                                                    <?php echo form_error('name_category')?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rev">Thu / Chi</label>
                                                    <select class="form-control" name ="rev" id ="rev" value ="<?php echo set_value('rev') ?>">
                                                        <option value="0">Thu</option>
                                                        <option value="1">Chi</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="des">Mô tả danh mục</label>
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