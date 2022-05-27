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
                        <h5 class="m-b-10">Chỉnh sửa thông tin danh mục</h5>
                        <p class="m-b-0">Chỉnh sửa thông tin danh mục trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Danh mục</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=category&action=changeCategory">Chỉnh sửa thông tin danh mục
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
                                    <h5 class="card-title">Chỉnh sửa thông tin danh mục</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="name">Tên loại thu chi</label>
                                            <input id="name" type="text" name="name" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $category['name']; ?>" class="form-control" placeholder="Nhập tên danh mục">
                                            <?php echo form_error('name') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="rev">Thu / Chi</label>
                                            <select name="rev" id="rev" class="form-control"  value="<?php echo set_value('rev') ?>">
                                                <option <?php if($category['rev'] == '0' && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) )){echo("selected");}?> value="0">Thu</option>
                                                <option <?php if($category['rev'] == '1' && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) )){echo("selected");}?> value="1">Chi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="des">Mô tả danh mục</label>
                                            <input id="des" type="textarea" name="des" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $category['des']; ?>" class="form-control" placeholder="Nhập mô tả">
                                            <?php echo form_error('des') ?>
                                        </div>

                                        <?php echo form_error('category') ?>
                                        <button type="submit" class="btn btn-success" name="btn-update" id="btn-update">Cập nhật</button>
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