<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Danh sách khách hàng</h5>
                        <p class="m-b-0">Danh sách Khách hàng trong hệ thống</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=client&action=listClient">Khách hàng</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?mod=client&action=listClient">Danh sách Khách hàng</a>
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
                                    <a class="btn btn-info" href="?mod=client&action=addClient">Đăng kí khách hàng
                                        mới</a>
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
                                                    <th>Họ - Tên</th>
                                                    <th>Tuổi</th>
                                                    <th>Giới tính</th>
                                                    <th>Thẻ căn cước</th>
                                                    <th>Thẻ đăng kí</th>
                                                    <th>Ảnh</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($clients as $item) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i ?></th>
                                                    <td><?php echo $item['Name'] ?></td>
                                                    <td><?php echo $item['Age'] ?></td>
                                                    <td><?php echo $item['Sex'] ?></td>
                                                    <td><?php echo $item['CitizenID'] ?></td>
                                                    <td><?php echo $item['CardID'] ?></td>
                                                    <td><?php echo $item['FaceID'] ?></td>
                                                    <td class="">
                                                        <a class="mr-2" title="Sửa"
                                                            href="<?php echo $item['changeClient'] ?>"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a title="Xóa" href="<?php echo $item['deleteClient'] ?>"
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