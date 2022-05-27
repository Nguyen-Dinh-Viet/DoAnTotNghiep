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
                        <h5 class="m-b-10">Chỉnh sửa thông tin tài khoản ngân hàng</h5>
                        <p class="m-b-0">Chỉnh sửa thông tin tài khoản ngân hàng  trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Tài khoản ngân hàng</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=bank&action=addBank">Chỉnh sửa thông tin tài khoản ngân hàng
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
                                    <h5 class="card-title">Chỉnh sửa thông tin tài khoản ngân hàng</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                   
                                    <form method="POST">
                                    <div class="form-group">
                                                    <label for="name_account">Tên tài khoản ngân hàng</label>
                                                    <input id="name_account" type="text" name="name_account" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $account['name']; ?>" class="form-control" placeholder="Nhập tên tài khoản ngân hàng">
                                                    <?php echo form_error('name_account')?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="code">Số tài khoản</label>
                                                    <input id="code" type="text" name="code" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $account['code']; ?>" class="form-control" placeholder="Nhập số tài khoản">
                                                    <?php echo form_error('code')?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bank">Ngân hàng</label>
                                                    <select id ="bank" name ="bank" class="form-control" value ="<?php echo set_value('bank') ?>">
                                                        <?php
                                                            foreach ($banks as $item) {
                                                                # code...
                                                                ?>  
                                                                    <option <?php if($account['bank'] == $item['id'] && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) )){echo("selected");} ?> value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="currency">Tiền tệ</label>
                                                    <select name ="currency" id ="currency"  class="form-control" value ="<?php echo set_value('currency') ?>">
                                                    <?php
                                                            foreach ($currency as $item) {
                                                                # code...
                                                                ?>  
                                                                    <option <?php if($account['currency'] == $item['id'] && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) )){echo("selected");} ?> value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">Số tiền</label>
                                                    <input id="amount" type="text" name="amount" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $account['amount']; ?>" class="form-control" placeholder="Nhập số tiền">
                                                    <?php echo form_error('amount')?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ship">Tàu (nếu có)</label>
                                                    <select name ="ship" id ="ship"  class="form-control" value ="<?php echo set_value('ship') ?>">
                                                    <option <?php if($account['ship'] == "0" && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) )){echo("selected");} ?> value="0">Chọn tàu</option>
                                                    <?php
                                                            foreach ($ships as $item) {
                                                                # code...
                                                                ?>  
                                                                    <option <?php if($account['ship'] == $item['id'] && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']) )){echo("selected");} ?> value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                        <?php echo form_error('bank') ?>
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