<?php
function PageName()
{
    // return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    return $url;
}
$current_page = PageName();
// function getListAccount()
// {
//     $list_account = db_fetch_array("SELECT ac.id as id, ac.name as name, ac.code as code, ac.bank as id_bank, ac.currency as id_currency, ba.name as bank_name, cu.name as currency_name, ac.amount as amount FROM `account` as ac LEFT JOIN `banks` as ba on ac.`bank` = ba.`id` LEFT JOIN `currency` as cu on ac.`currency` = cu.`id` WHERE ac.`ship` = '0'");
//     return $list_account;
// }
// $list_account = getListAccount();
// 
?>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-80 img-radius" src="assets/images/KimDami.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <span id="more-details"><?php $info = get_info_user();
                                                    echo ($info["user_email"]);  ?><i
                                    class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                    <div class="main-menu-content">
                        <ul>
                            <li class="more-details">
                                <a href="user-profile.html"><i class="ti-user"></i>Xem hồ sơ cá nhân</a>
                                <!-- <a href="#!"><i class="ti-settings"></i>Settings</a> -->
                                <a href="?mod=user&action=logout"><i class="ti-layout-sidebar-left"></i>Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-15 p-b-0">
                    <form class="form-material">
                        <div class="form-group form-primary">
                            <input type="text" name="footer-email" class="form-control">
                            <span class="form-bar"></span>
                            <label class="float-label"><i class="fa fa-search m-r-10"></i>Tìm kiếm</label>
                        </div>
                    </form>
                </div>
                <!-- TRANG CHỦ -->
                <div class="pcoded-navigation-label">Trang chủ</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?php if ($current_page == "" || $current_page == "?mod=homes") {
                                    echo ("active");
                                } ?>">
                        <a href="?mod=homes" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext">Trang chủ</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <!-- THỐNG KÊ -->
                <div class="pcoded-navigation-label">Thống kê</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?php if ($current_page == "" || $current_page == "?mod=home") {
                                    echo ("active");
                                }
                                ?>">
                        <a href="?mod=home" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fas fa-chart-line"></i><b>D</b></span>
                            <span class="pcoded-mtext">Thống kê</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>

                <!-- QUẢN LÝ -->
                <div class="pcoded-navigation-label">Quản lý</div>
                <ul class="pcoded-item pcoded-left-item">
                    <!-- Danh sách thẻ -->
                    <li class="pcoded-hasmenu  <?php if (strpos($current_page, "?mod=ListCardRFID") !== false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-address-card"
                                    aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Danh sách thẻ ra-vào</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=cardrfid&action=listCardRFID") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=cardrfid&action=listCardRFID" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Danh sách thẻ ra-vào</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Danh sách khách hàng -->
                    <li class="pcoded-hasmenu  <?php if (strpos($current_page, "?mod=ListClient") !== false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-user" aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Danh sách Khách hàng</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=client&action=listClient") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=client&action=listClient" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Danh sách Khách hàng</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Quản lý người dùng -->
                    <li class="pcoded-hasmenu <?php if ($current_page == "?mod=user&action=listUser" || $current_page == "?mod=user&action=addUser" || strpos($current_page, "?mod=user&action=changeUser") !== false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-user" aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Người dùng</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=user&action=listUser") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=user&action=listUser" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Danh sách người dùng</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=user&action=addUser") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=user&action=addUser" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Tạo tài khoản</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Kiểm soát vào-ra -->
                    <li class="pcoded-hasmenu <?php #if ($current_page == "?mod=accesscontrol&action=listAccesscontrol" !== false) {
                                                #echo ("active pcoded-trigger");
                                                #}
                                                ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fas fa-history" aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Kiểm soát vào-ra</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=accesscontrol&action=listAccesscontrol") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=accesscontrol&action=listAccesscontrol" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Lịch sử vao-ra</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- BÁO CÁO -->
                <div class="pcoded-navigation-label">Báo cáo</div>
                <ul class="pcoded-item pcoded-left-item">
                </ul>
            </div>
        </nav>