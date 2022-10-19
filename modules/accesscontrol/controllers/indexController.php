<?php

// Khởi tạo View
function construct()
{
    load_model('index');
}

// Hiển thị danh sách lịch sử ra vào
function listAccesscontrolAction()
{
    $data['accesscontrols'] = get_info_accesscontrols();
    // if (isset($_POST['btn-search-accesscontrol'])) {
    //     $error = array();
    //     if (empty($_POST['LicensePlateSearch']) && empty($_POST['from_date']) && empty($_POST['to_date'])) {
    //         $error['errorNull'] = "Mời bạn nhập thông tin tìm kiếm!";
    //     } elseif (empty($_POST['from_date']) && empty($_POST['to_date'])) {
    //         $LicensePlateSearch = $_POST['LicensePlateSearch'];
    //     }
    //     if (empty($_POST['from_date'])) {
    //         $error['date'] = "Xin mời bạn chọn ngày!";
    //     } else {
    //         $from = $_POST['from_date'];
    //     }
    //     if (empty($_POST['to_date'])) {
    //         $error['date'] = "Xin mời bạn chọn ngày!";
    //     } else {
    //         $to = $_POST['to_date'];
    //     }
    //     if (empty($error)) {
    //         $data_all = get_list_info_general($LicensePlateSearch, $ship_id, $from, $to);
    //         foreach ($data_all as $item) {
    //             # code...
    //             if ($item['currency'] == '1') {
    //                 $data['sum_vnd'] = $data['sum_vnd'] + $item['tien_vnd'];
    //             } else {
    //                 $data['sum_usd'] = $data['sum_usd'] + $item['tien_usd'];
    //             }
    //         }
    //         $data['data'] = $data_all;
    //     }
    // }
    load_view("listAccesscontrol", $data);
}

// Thêm mới khách hàng
// function addClientAction()
// {
//     $info['cards'] = get_list_card();
//     global $Name, $Age, $Sex, $CitizenID, $cards;
//     if (isset($_POST['btn-submit'])) {
//         $error = array();
//         if (empty($_POST['Name'])) {
//             $error['Name'] = 'Bạn cần điền Họ tên';
//         } else {
//             $Name = $_POST['Name'];
//         }
//         if (empty($_POST['Age'])) {
//             $error['Age'] = 'Bạn cần điền tuổi';
//         } else {
//             $Age = $_POST['Age'];
//         }
//         // if (empty($_POST['Sex'])) {
//         //     $error['Sex'] = 'Bạn cần điền giới tính';
//         // } else {
//         $Sex = $_POST['Sex'];
//         // }
//         if (empty($_POST['CitizenID'])) {
//             $error['CitizenID'] = 'Bạn cần điền Căn cước công dân';
//         } else {

//             $CitizenID = $_POST['CitizenID'];
//         }
//         $cards = $_POST['CardID'];
//         //Bắt đầu thêm
//         if (empty($error)) {
//             $data = array(
//                 'Name' => $Name,
//                 'Age' => $Age,
//                 'Sex' => $Sex,
//                 'CitizenID' => $CitizenID,
//                 'CardID' => $cards,
//             );
//             db_insert('client', $data);
//             echo "<script type='text/javascript' >alert('Thêm khách hàng thành công!')</script>";
//         }
//     }
//     load_view("addClient", $info);
//     // load_view("listClient");
// }

// Xóa Lịch sử vào-ra
function detailAccesscontrolAction()
{
    load_view('detailAccesscontrol');
}

// Xóa Lịch sử vào-ra
function deleteAccesscontrolAction()
{
    load_view('deleteAccesscontrol');
}