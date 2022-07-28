<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Lịch sử ra-vào</h5>
                        <p class="m-b-0">Lịch sử ra-vào trong hệ thống</p>
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
                            <a href="?mod=accesscontrol&action=listAccesscontrol">Lịch sử ra-vào</a>
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
                                                    <th>STT</th>
                                                    <th>Thời gian vào</th>
                                                    <th>Thời gian ra</th>
                                                    <th>Biển số xe</th>
                                                    <th>Họ Tên</th>
                                                    <th>Số thẻ</th>
                                                    <th>Thao tác</th>
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
                                                    <td><?php echo $item['Name'] ?></td>
                                                    <td><?php echo $item['CardNumber'] ?></td>
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