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
                        <h5 class="m-b-10">Chỉnh sửa tài khoản</h5>
                        <p class="m-b-0">Chỉnh sửa tài khoản trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Người dùng</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=user&action=changeUser">Chỉnh sửa tài khoản</a>
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
                                    <h5 class="card-title">Chỉnh sửa tài khoản</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                    <form  method="POST">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Họ</label>
                                                    <input id="lastname" type="text" name="lastname" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $user['user_lname'];?>" class="form-control" placeholder="Nhập họ">
                                                    <?php echo form_error('lastname')?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="middlename">Tên đệm</label>
                                                    <input id="middlename" type="text" name="middlename" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $user['user_mname'];?>" class="form-control" placeholder="Nhập tên đệm">
                                                    <?php echo form_error('middlename')?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="firstname">Tên</label>
                                                    <input id="firstname" type="text" name="firstname" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $user['user_fname'];?>" class="form-control" placeholder="Nhập tên">
                                                    <?php echo form_error('firstname')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Tên tài khoản (Email)</label>
                                            <input id="email" type="email" name="email" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $user['user_email'];?>" class="form-control" readonly >
                                            <?php echo form_error('email')?>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input id="phone" type="text" name="phone" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $user['user_contact'];?>" class="form-control" >
                                            <?php echo form_error('phone')?>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Giới tính</label>
                                            <select id ="gender" name="gender" class="form-control" value ="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $user['gender'];?>">
                                            <option <?php if($user['gender'] == 'Nam' && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']))){echo("selected");}?>  value="Nam">Nam</option>
                                                <option  <?php if($user['gender'] == 'Nữ' && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']))){echo("selected");}?> value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Quyền hạn</label>
                                            <select id="role" name="role" class="form-control" value ="<?php if(!empty($_SESSION['user_login'])) echo $user['user_role_id'];?>">
                                                <option <?php if($user['user_role_id'] == '1' && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']))){echo("selected");}?> value="1">Admin</option>
                                                <option <?php if($user['user_role_id'] == '2' && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']))){echo("selected");}?> value="2">Cổ đông</option>
                                                <option <?php if($user['user_role_id'] == '3' && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']))){echo("selected");}?> value="3">Nhân viên</option>
                                            </select>
                                        </div>
                                        <div class="form-group sub-role">
                                            <label for="tax_code">Mã số thuế</label>
                                            <input class="form-control" placeholder="Nhập mã số thuế" type="text" name="tax_code" id ="tax_code" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $user['taxcode'] ;  ?>">
                                        </div>
                                        <div class="form-group sub-role">
                                            <label for="address">Địa chỉ nơi ở</label>
                                            <input class="form-control" placeholder="Nhập địa chỉ nơi ở" type="text" name="address" id = "address" value="<?php if(!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $user['addr'] ;  ?>">
                                        </div>
                                        <div class="form-group form-check">
                                        <input class="form-check-input" id="activate" type="checkbox" value ="1" <?php if($user['activate']==1 && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']))) echo "checked"   ?>  name="activate">
                                            <label for="activate" class="form-check-label">Active</label>
                                            
                                        </div>
                                        <?php echo form_error('account')?>
                                        <button type="submit" class ="btn btn-success" name="btn-update-user" id="btn-update-user">Cập nhật</button>
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