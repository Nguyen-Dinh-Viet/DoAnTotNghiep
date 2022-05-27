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
                        <h5 class="m-b-10">Chỉnh sửa thông tin tàu</h5>
                        <p class="m-b-0">Chỉnh sửa thông tin tàu trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Tàu</a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=ship&action=changeShip">Chỉnh sửa thông tin tàu</a>
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
                                    <h5 class="card-title">Chỉnh sửa thông tin tàu</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">
                                    <div class="row">

                                        <div class="col-md-5">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label for="name">Tên tàu</label>
                                                    <input id="name" type="text" name="name" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $ship['name']; ?>" class="form-control" placeholder="Nhập tên tàu">
                                                    <?php echo form_error('name') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="type_ship">Loại tàu</label>
                                                    <input id="type_ship" type="text" name="type_ship" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $ship['type']; ?>" class="form-control" placeholder="Nhập loại tàu">
                                                    <?php echo form_error('type_ship') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="number">Mã hiệu</label>
                                                    <input id="number" type="text" name="number" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $ship['number']; ?>" class="form-control" placeholder="Nhập số hiệu tàu">
                                                    <?php echo form_error('number') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="volume">Trọng tải toàn phần (tấn)</label>
                                                    <input id="volume" type="number" min="0" max="1000" name="volume" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $ship['volume']; ?>" class="form-control" placeholder="Nhập trọng tải toàn phần của tàu">
                                                    <?php echo form_error('volume') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateStart">Ngày bắt đầu</label>
                                                    <input id="dateStart" type="date" name="dateStart" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $ship['dateStart']; ?>" class="form-control">
                                                    <?php echo form_error('dateStart') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="des">Mô tả tàu</label>
                                                    <input id="des" type="textarea" name="des" value="<?php if (!empty($_COOKIE['is_login']) || !empty($_SESSION['user_login'])) echo $ship['des']; ?>" class="form-control" placeholder="Nhập mô tả">
                                                    <?php echo form_error('des') ?>
                                                </div>

                                                <?php echo form_error('ship') ?>
                                                <button type="submit" class="btn btn-success" name="btn-update-ship" id="btn-update-ship">Cập nhật</button>
                                            </form>
                                        </div>
                                        <div class="col-md-7">
                                            <p style="font-size: 20px;font-weight:600;color:black">Cập nhật cổ đông cho tàu</p>
                                            <form method="POST">


                                                <div class="form-group">
                                                    <label for="shareholder_id">Chọn cổ đông</label>
                                                    <select value="" id="shareholder_id" name="shareholder_id" class="form-control">
                                                        <?php
                                                        foreach ($list_shareholder as $item) {
                                                            # code...?
                                                        ?>
                                                            <option value="<?php echo $item['id'] ?>"><?php echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ratio">Cổ phần (%)</label>
                                                    <input class="form-control" id ="ratio" type="text" name="ratio" value="">
                                                </div>
                                                <?php echo form_error('ratio') ?>
                                                <div class="form-group">
                                                    <label for="info">Mô tả về sở hữu</label>
                                                    <input class="form-control" type="text" id="info" name="info" value="">
                                                </div>
                                                <button type="submit" class="btn btn-info" name="btn-add-shareholder" id="btn-add-shareholder">Thêm cổ đông</button>
                                            </form>
                                            <p style="font-size: 20px;font-weight:600;color:black" class="mt-2">Danh sách cổ đông</p>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Tên cổ đông</th>
                                                            <th>Cổ phần (%)</th>
                                                            <th>Mô tả</th>
                                                            <th>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        foreach ($shareholders as $item) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $i ?></th>
                                                                <td><?php echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></td>
                                                                <td><?php echo $item['ratio'] ?></td>
                                                                <td><?php echo $item['info'] ?></td>
                                                                <td class="">
                                                                    <span style="cursor: pointer" class="mr-2 change_shareholder" title="Sửa" data-id-ship="<?php echo $ship['id'] ?>" data-id="<?php echo $item['id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                                    <a title="Xóa" href="?mod=ship&action=deleteShareHolder&idShip=<?php echo $ship['id'] ?>&idHolder=<?php echo $item['idHolder'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $i = $i + 1;
                                                        }
                                                        ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Cấu trưc modal -->
                                    <div class="modal fade" id="modal-info-shareholder">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Chỉnh sửa thông tin cổ đông
                                                    </h5>
                                                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <!-- and modal-header	 -->
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form method="POST">
                                                                    <input type="text" class="d-none" name="change_id" value="" id="change_id">
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="change_shareholder_id">Chọn cổ đông</label>
                                                                        <select  disabled="true" value="" id="change_shareholder_id" name="change_shareholder_id" class="form-control">
                                                                            <?php
                                                                            foreach ($list_shareholder as $item) {
                                                                                # code...?
                                                                            ?>
                                                                                <option value="<?php echo $item['id'] ?>"><?php echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="change_ratio">Cổ phần (%)</label>
                                                                        <input class="form-control" type="text" id ="change_ratio" name="change_ratio" value="">
                                                                    </div>
                                                                    <p class="error_ratio error"></p>
                                                                    <div class="form-group">
                                                                        <label for="change_info">Mô tả về sở hữu</label>
                                                                        <input class="form-control" type="text" id="change_info" name="change_info" value="">
                                                                    </div>


                                                                </form>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end modal-body -->
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <button class="btn btn-primary btn-save">Lưu</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end-modal -->
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