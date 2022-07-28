<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php
$id = (int)$_GET['id'];
$info = get_info_accesscontrol_by_id($id);
?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Chi tiết Lịch sử ra-vào</h5>
                        <p class="m-b-0">Chi tiết Lịch sử ra-vào trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=accesscontrol&action=listAccesscontrol">Kiểm soát
                                ra-vào</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?mod=accesscontrol&action=listAccesscontrol">Chi tiết Lịch sử ra-vào</a>
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
                                    <!-- <a class="btn btn-info" href="?mod=client&action=addClient">Đăng kí Lịch sử ra-vào
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
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Thời gian vào</th>
                                                    <th>Thời gian ra</th>
                                                    <th>Biển số xe</th>
                                                    <th>Họ Tên</th>
                                                    <th>Số thẻ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $info['TimeIn'] ?></td>
                                                    <td><?php echo $info['TimeOut'] ?></td>
                                                    <td><?php echo $info['LicensePlates'] ?></td>
                                                    <td><?php echo $info['Name'] ?></td>
                                                    <td><?php echo $info['CardNumber'] ?></td>
                                                </tr>
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