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
                        <h5 class="m-b-10">Chỉnh sửa sổ thống kê tàu</h5>
                        <p class="m-b-0">Chỉnh sửa thông tin sổ thống kê tàu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Sổ chính</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Chỉnh sửa sổ thống kê tàu
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
                                    <h5 class="card-title">Chỉnh sửa sổ thống kê tàu</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                  
                                    <form  method="POST">
                                        <div class="wp-input">
                                            <label for="date">Ngày</label>
                                            <input type="date" name="date" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $ledger['date'] ; ?>" class="form-control">
                                        </div>
                                        <div class="wp-input">
                                            <label for="cat_id">Loại thu chi</label>
                                            <select value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $ledger['cat_id'] ;  ?>" id="cat_id" name="cat_id" class="form-control">
                                                <?php
                                                foreach ($category as $item) {
                                                    # code...?
                                                ?>
                                                    <option <?php if((!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']))&& $ledger['cat_id'] == $item['id'] ) {echo("selected");}  ?> value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div  class="wp-input">
                                            <label for="money_1">Thu</label>
                                            <input class="form-control" type="text" id="money_1" name="money_1" value="<?php if((!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) )&& $ledger['spend'] == '0') echo $ledger['money'] ; ?>" placeholder="Số tiền">
                                        </div>
                                        <div class="wp-input">
                                            <label for="money_2">Chi</label>
                                            <input class="form-control" type="text" id="money_2" name="money_2" value="<?php if((!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) )&& $ledger['spend'] == '1') echo $ledger['money'] ; ?>" placeholder="Số tiền">
                                        </div>
                                        <?php echo form_error('money')?>
                                        <div class="wp-input">
                                            <label for="des">Mô tả</label>
                                            <input class="form-control" type="text" id="des" name="des" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) ){echo $ledger['des'];} ?>" placeholder="Mô tả">
                                        </div>
                                        <button type="submit" class="btn btn-success mt-2" name="btn-update" id="btn-update">Cập nhật</button>
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