<?php

// Khởi tạo View
function construct()
{
    load_model('index');
}

// Hiển thị danh sách các thẻ ra-vào
function listCardAction()
{
    $data['cards'] = get_info_cards();
    load_view("listCard", $data);
}

//Thêm mới thẻ ra-vào
function addCardAction()
{
    global $CardNumber, $DateSignCard, $LicensePlates, $Color, $Brand, $DateSignCar;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['CardNumber'])) {
            $error['CardNumber'] = 'Bạn cần điền số thẻ';
        } else {
            $CardNumber = $_POST['CardNumber'];
        }
        // if (empty($_POST['DateSignCard'])) {
        //     $error['DateSignCard'] = 'Bạn cần chọn Ngày đăng kí thẻ';
        // } else {
        $DateSignCard = $_POST['DateSignCard'];
        // }
        if (empty($_POST['LicensePlates'])) {
            $error['LicensePlates'] = 'Bạn cần điền biển số xe';
        } else {
            $LicensePlates = $_POST['LicensePlates'];
        }
        if (empty($_POST['Color'])) {
            $error['Color'] = 'Bạn cần điền màu xe';
        } else {

            $Color = $_POST['Color'];
        }
        if (empty($_POST['Brand'])) {
            $error['Brand'] = 'Bạn cần điền thương hiệu xe';
        } else {

            $Brand = $_POST['Brand'];
        }
        // if (empty($_POST['DateSignCar'])) {
        //     $error['DateSignCar'] = 'Bạn cần chọn Ngày đăng kí xe';
        // } else {
        $DateSignCar = $_POST['DateSignCar'];
        // }

        //Bắt đầu thêm
        if (empty($error)) {
            $data = array(
                'CardNumber' => $CardNumber,
                'DateSignCard' => $DateSignCard,
                'LicensePlates' => $LicensePlates,
                'Color' => $Color,
                'Brand' => $Brand,
                'DateSignCar' => $DateSignCar,
            );
            db_insert('card', $data);
            echo "<script type='text/javascript' >alert('Thêm thẻ ra-vào thành công!')</script>";
        }
    }
    load_view("addCard");
}

//Sửa thông tin thẻ ra-vào
function changeCardAction()
{
    $id = (int)$_GET['id'];
    $info_card = get_info_card_by_id($id);
    $data = array();
    $data['card'] = $info_card;
    global $CardNumber, $DateSignCard, $LicensePlates, $Color, $Brand, $DateSignCar;
    if (isset($_POST['btn-update'])) {
        $error = array();
        if (empty($_POST['CardNumber'])) {
            $error['CardNumber'] = 'Bạn cần điền số thẻ';
        } else {
            $CardNumber = $_POST['CardNumber'];
        }
        // if (empty($_POST['DateSignCard'])) {
        //     $error['DateSignCard'] = 'Bạn cần chọn Ngày đăng kí thẻ';
        // } else {
        // $DateSignCard = $_POST['DateSignCard'];
        $DateSignCard = $_POST['DateSignCard'];
        // }
        if (empty($_POST['LicensePlates'])) {
            $error['LicensePlates'] = 'Bạn cần điền biển số xe';
        } else {
            $LicensePlates = $_POST['LicensePlates'];
        }
        if (empty($_POST['Color'])) {
            $error['Color'] = 'Bạn cần điền màu xe';
        } else {

            $Color = $_POST['Color'];
        }
        if (empty($_POST['Brand'])) {
            $error['Brand'] = 'Bạn cần điền thương hiệu xe';
        } else {

            $Brand = $_POST['Brand'];
        }
        // if (empty($_POST['DateSignCar'])) {
        //     $error['DateSignCar'] = 'Bạn cần chọn Ngày đăng kí xe';
        // } else {
        $DateSignCar = $_POST['DateSignCar'];
        // }

        //Bắt đầu thêm
        if (empty($error)) {
            $data1 = array(
                'CardNumber' => $CardNumber,
                'DateSignCard' => $DateSignCard,
                'LicensePlates' => $LicensePlates,
                'Color' => $Color,
                'Brand' => $Brand,
                'DateSignCar' => $DateSignCar,
            );
            $where = "`id`={$id}";
            db_update('card', $data1, $where);
            $info_card = get_info_card_by_id($id);
            $data['card'] = $info_card;
            echo "<script type='text/javascript' >alert('Cập nhật thẻ thành công!')</script>";
        }
    }
    load_view('changeCard', $data);
}

//Xóa thẻ ra-vào
function deleteCardAction()
{
    load_view('deleteCard');
}