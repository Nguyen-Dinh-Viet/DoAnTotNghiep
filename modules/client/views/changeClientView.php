<?php get_header() ?>
<?php get_sidebar() ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Chỉnh sửa thông tin khách hàng</h5>
                        <p class="m-b-0">Chỉnh sửa thông tin khách hàng trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?mod=client&action=listClient">Khách hàng</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?mod=client&action=changeClient">Chỉnh sửa thông tin Khách hàng</a>
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
                                    <h5 class="card-title">Chỉnh sửa thông tin khách hàng</h5>
                                </div>
                                <div class="card-block">
                                    <form method="POST">
                                        <!-- Họ tên -->
                                        <div class="form-group">
                                            <label for="Name">Họ tên</label>
                                            <input id="Name" type="text" name="Name"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $client['Name']; ?>"
                                                class="form-control" placeholder="Nhập Họ và tên khách hàng">
                                            <?php echo form_error('Name') ?>
                                        </div>
                                        <!-- Tuổi -->
                                        <div class="form-group">
                                            <label for="Age">Tuổi</label>
                                            <input id="Age" type="number" name="Age"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $client['Age']; ?>"
                                                class="form-control" placeholder="Nhập tuổi khách hàng">
                                            <?php echo form_error('Age') ?>
                                        </div>
                                        <!-- Giới tính -->
                                        <div class="form-group">
                                            <label for="Sex">Giới tính</label>
                                            <select id="Sex" name="Sex" class="form-control"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $client['Sex']; ?>">
                                                <option <?php if (set_value('Sex') == "Nam") {
                                                            echo ("selected");
                                                        } ?> value="Nam">Nam</option>
                                                <option <?php if (set_value('Sex') == "Nữ") {
                                                            echo ("selected");
                                                        } ?> value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                        <!-- Căn cước công dân -->
                                        <div class="form-group">
                                            <label for="CitizenID">Căn cước công dân</label>
                                            <input id="CitizenID" type="number" name="CitizenID"
                                                value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $client['CitizenID']; ?>"
                                                class="form-control" placeholder="Nhập Căn cước công dân">
                                            <?php echo form_error('CitizenID') ?>
                                        </div>
                                        <!-- Thẻ ra-vào -->
                                        <div class="form-group">
                                            <label for="CardID">Chọn thẻ ra-vào (nếu có)</label>
                                            <!-- <select name="CardID" id="CardID" class="form-control"
                                                value="<?php #if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $client['CardID']; 
                                                        ?>">
                                                <option value="">Chọn thẻ ra-vào</option>
                                                <?php #foreach ($cards as $item) { 
                                                ?>
                                                <option value="<?php #echo $item['ID'] 
                                                                ?>">
                                                    <?php #echo $item['CardNumber'] 
                                                    ?>
                                                </option>
                                                <?php
                                                #}
                                                ?>
                                            </select> -->

                                            <select name="CardID" id="CardID" class="form-control"
                                                value="<?php echo set_value('CardID') ?>">
                                                <?php foreach ($cards as $item) { ?>
                                                <option <?php if ($client['CardID'] == $item['ID'] && (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login']))) {
                                                                echo ("selected");
                                                            } ?> value="<?php echo $item['ID'] ?>">
                                                    <?php echo $item['CardNumber'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
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