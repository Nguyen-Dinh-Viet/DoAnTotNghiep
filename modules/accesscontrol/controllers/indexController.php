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