<?php
function PageName()
{
    // return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    return $url;
}
$current_page = PageName();
function getListAccount()
{
    $list_account = db_fetch_array("SELECT ac.id as id, ac.name as name, ac.code as code, ac.bank as id_bank, ac.currency as id_currency, ba.name as bank_name, cu.name as currency_name, ac.amount as amount FROM `account` as ac LEFT JOIN `banks` as ba on ac.`bank` = ba.`id` LEFT JOIN `currency` as cu on ac.`currency` = cu.`id` WHERE ac.`ship` = '0'" );
    return $list_account;
}
$list_account = getListAccount();
?>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-80 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <span id="more-details"><?php $info = get_info_user();
                                                    echo ($info["user_email"]);  ?><i class="fa fa-caret-down"></i></span>
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
                <div class="pcoded-navigation-label">Thống kê</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?php if ($current_page == "" || $current_page == "?mod=home") {
                                    echo ("active");
                                } ?>">
                        <a href="?mod=home" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext">Thống kê</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <div class="pcoded-navigation-label">Báo cáo</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu  <?php if (strpos($current_page,"?mod=report")!==false) {
                                                    echo ("active pcoded-trigger");
                                                }?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext">Báo cáo</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                        <li class="<?php if ($current_page == "?mod=report&action=general") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=report&action=general" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Báo cáo chung</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=report&action=index") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=report&action=index" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Báo cáo chi trả cổ đông</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=report&action=revenueShip") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=report&action=revenueShip" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Báo cáo doanh thu tàu</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=report&action=oilShip") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=report&action=oilShip" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Báo cáo nhập dầu</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=report&action=salaryHolder") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=report&action=salaryHolder" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Báo cáo lương</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=report&action=interestHolder") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=report&action=interestHolder" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Báo cáo chi vay lãi cổ đông</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigation-label">Quản lý</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu <?php if (strpos($current_page,"?mod=ledgers&action=accountLedgers")!==false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-book" aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Sổ chính</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <?php
                            foreach ($list_account as $item) {
                                # code...
                            ?>
                                <li class="<?php if ($current_page == "?mod=ledgers&action=accountLedgers&id=".$item['id']) {
                                                echo ("active");
                                            } ?>">
                                    <a href="?mod=ledgers&action=accountLedgers&id=<?php echo $item['id'] ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext"><?php echo($item['name'].'-'.$item['bank_name']." (".$item['currency_name'].")") ?></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu <?php if ($current_page == "?mod=user&action=listUser" || $current_page == "?mod=user&action=addUser" || strpos($current_page,"?mod=user&action=changeUser")!==false) {
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
                    <li class="pcoded-hasmenu <?php if ($current_page == "?mod=ship&action=listShip" || $current_page == "?mod=ship&action=addShip" || strpos($current_page,"?mod=ship&action=changeShip")!==false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-ship" aria-hidden="true"></i></i><b>D</b></span>
                            <span class="pcoded-mtext">Tàu</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=ship&action=listShip") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=ship&action=listShip" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Danh sách tàu</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=ship&action=manageShip") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=ship&action=manageShip" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Quản lý vận chuyển</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=ship&action=addShip") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=ship&action=addShip" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Tạo tàu mới</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu <?php if ($current_page == "?mod=currency&action=listCurrency" || $current_page == "?mod=currency&action=addCurrency" || strpos($current_page,"?mod=currency&action=changeCurrency")!==false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-money" aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Tiền tệ</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=currency&action=listCurrency") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=currency&action=listCurrency" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Danh sách tiền tệ</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=currency&action=addCurrency") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=currency&action=addCurrency" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Tạo tiền tệ mới</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu <?php if ($current_page == "?mod=bank&action=listBank" || $current_page == "?mod=bank&action=addBank" || strpos($current_page,"?mod=bank&action=changeBank")!==false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-university" aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Ngân hàng</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=bank&action=listBank") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=bank&action=listBank" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Danh sách ngân hàng</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=bank&action=addBank") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=bank&action=addBank" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Tạo ngân hàng mới</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu <?php if ($current_page == "?mod=account&action=listAccount" || $current_page == "?mod=account&action=addAccount" || strpos($current_page,"?mod=account&action=changeAccount")!==false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-address-card" aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Tài khoản ngân hàng</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=account&action=listAccount") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=account&action=listAccount" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Danh sách tài khoản ngân hàng</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=account&action=addAccount") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=account&action=addAccount" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Tạo tài khoản ngân hàng mới</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu <?php if ($current_page == "?mod=category&action=listCategory" || $current_page == "?mod=category&action=addCategory" || strpos($current_page,"?mod=category&action=changeCategory")!==false) {
                                                    echo ("active pcoded-trigger");
                                                } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-list" aria-hidden="true"></i><b>D</b></span>
                            <span class="pcoded-mtext">Danh mục</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if ($current_page == "?mod=category&action=listCategory") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=category&action=listCategory" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Danh sách danh mục</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if ($current_page == "?mod=category&action=addCategory") {
                                            echo ("active");
                                        } ?>">
                                <a href="?mod=category&action=addCategory" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Tạo danh mục mới</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>