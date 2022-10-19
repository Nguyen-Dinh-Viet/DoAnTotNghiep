<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php
// *** Include the class
include("resize-class.php");

function base64_to_jpeg($base64_string, $output_file)
{
    // open the output file for writing
    $ifp = fopen($output_file, 'wb');

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode(',', $base64_string);

    // we could add validation here with ensuring count( $data ) > 1
    fwrite($ifp, base64_decode($data[1]));

    // // *** 1) Initialise / load image
    // $new = new resize($ifp);

    // // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    // $new->resizeImage(200, 200, 'crop');

    // // *** 3) Save image
    // $new->saveImage($ifp, 1000);

    // clean up the file resource
    fclose($ifp);


    return $output_file;
}
?>
<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: center;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
</style>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Lịch sử vào-ra</h5>
                        <p class="m-b-0">Lịch sử vào-ra trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=accesscontrol&action=listAccesscontrol">Kiểm soát
                                vào-ra</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?mod=accesscontrol&action=listAccesscontrol">Lịch sử vào-ra</a>
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
                            <!-- Hover table card start -->
                            <div class="card">
                                <div class="card-header">
                                    <!-- <a class="btn btn-info" href="?mod=client&action=addClient">Đăng kí Lịch sử vào-ra
                                        mới</a> -->
                                    <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                            <li><i class="fa fa-trash close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <!-- FORM SEARCH -->
                                    <form method="POST">
                                        <div class="d-flex mb-3" style="justify-content: space-between;">
                                            <div class="form-inline mr-4">
                                                <label for="LicensePlateSearch" class="mr-2"
                                                    style="font-weight:600;">Biển
                                                    số</label>
                                                <input class="form-control" type="text" name="LicensePlateSearch"
                                                    id="LicensePlateSearch"
                                                    value="<?php echo set_value('LicensePlateSearch') ?>">
                                                <!--<label for="cat_id" style="font-weight:600;">Thu/Chi</label>
                                                <select value="<?php #echo set_value('cat_id') 
                                                                ?>" id="cat_id"
                                                    name="cat_id" class="form-control">
                                                    <?php
                                                    #foreach ($category as $item) {
                                                    # code...?
                                                    ?>
                                                    <option value="<?php #echo $item['id'] 
                                                                    ?>">
                                                        <?php #echo $item['name'] 
                                                        ?></option>
                                                    <?php
                                                    #}
                                                    ?>
                                                </select>-->
                                            </div>
                                            <div class="form-inline mr-4">
                                                <!--<label for="ship_id" style="font-weight:600;">Tàucs</label>
                                                <select value="" id="ship_id" name="ship_id" class="form-control">
                                                    
                                                    <?php
                                                    #foreach ($list_ship as $item) {
                                                    # code...?
                                                    ?>
                                                    <option value="<?php #echo $item['id'] 
                                                                    ?>">
                                                        <?php #echo $item['name'] 
                                                        ?></option>
                                                    <?php
                                                    #}
                                                    ?>

                                                </select>-->
                                            </div>
                                            <div class="form-inline mr-2">
                                                <label for="from_date" class="mr-2" style="font-weight:600;">Từ</label>
                                                <input class="form-control" type="date" name="from_date" id="from_date"
                                                    value="<?php echo set_value('from') ?>">
                                            </div>
                                            <div class="form-inline mr-2">
                                                <label for="to_date" class="mr-2" style="font-weight:600;">Đến</label>
                                                <input class="form-control" type="date" name="to_date" id="to_date"
                                                    value="<?php echo set_value('to') ?>">
                                            </div>
                                            <?php echo form_error('date') ?>
                                            <button type="submit" name="btn-search-report" id="btn-search-accesscontrol"
                                                class="btn btn-success">Tìm kiếm</button>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-hover styled-table" style="text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th style="width: 11%">Thời gian vào</th>
                                                    <th style="width: 10%">Thời gian ra</th>
                                                    <th style="width: 9%">Biển số xe</th>
                                                    <th style="width: 9%">Số thẻ</th>
                                                    <th>Ảnh biển số</th>
                                                    <th>Khuôn mặt</th>
                                                    <!-- <th>Biển số</th> -->
                                                    <th style="width: 9%">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($accesscontrols as $item) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i ?></th>
                                                    <td><?php echo $item['TimeIn'] ?></td>
                                                    <td><?php echo $item['TimeOut'] ?></td>
                                                    <td><?php echo $item['LicensePlates'] ?></td>
                                                    <td><?php echo $item['CardNumber'] ?></td>
                                                    <td>
                                                        <img style="width:100%"
                                                            src="<?php echo base64_to_jpeg($item['LicensePlateID'], $item['CardNumber'] . ".jpg") ?>">
                                                    </td>
                                                    <td>
                                                        <img style="width:100%"
                                                            src="<?php echo base64_to_jpeg($item['FaceID'], $item['LicensePlates'] . ".jpg") ?>">
                                                    </td>
                                                    <td class="">
                                                        <a class="mr-2" title="Xem chi tiết"
                                                            href="<?php echo $item['detailAccesscontrol'] ?>"><i
                                                                class="fas fa-info-circle" aria-hidden="true"></i></a>
                                                        <a title="Xóa" href="<?php echo $item['deleteAccesscontrol'] ?>"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
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
                            <!-- Hover table card end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>