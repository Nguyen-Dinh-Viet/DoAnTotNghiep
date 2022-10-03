<?php

// Khởi tạo View
function construct()
{
    load_model('index');
}

// Hiển thị danh sách các khách hàng
function listClientAction()
{
    $data['clients'] = get_info_clients();
    load_view("listClient", $data);
}

// Thêm mới khách hàng
function addClientAction()
{
    $info['cards'] = get_list_card();
    global $Name, $Age, $Sex, $CitizenID;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['Name'])) {
            $error['Name'] = 'Bạn cần điền Họ tên';
        } else {
            $Name = $_POST['Name'];
        }
        if (empty($_POST['Age'])) {
            $error['Age'] = 'Bạn cần điền tuổi';
        } else {
            $Age = $_POST['Age'];
        }
        // if (empty($_POST['Sex'])) {
        //     $error['Sex'] = 'Bạn cần điền giới tính';
        // } else {
        $Sex = $_POST['Sex'];
        // }
        if (empty($_POST['CitizenID'])) {
            $error['CitizenID'] = 'Bạn cần điền Căn cước công dân';
        } else {

            $CitizenID = $_POST['CitizenID'];
        }
        // $cards = $_POST['CardID'];
        //Bắt đầu thêm
        if (empty($error)) {
            $data = array(
                'Name' => $Name,
                'Age' => $Age,
                'Sex' => $Sex,
                'CitizenID' => $CitizenID,

            );
            db_insert('client', $data);
            echo "<script type='text/javascript' >alert('Thêm khách hàng thành công!')</script>";
        }
    }
    load_view("addClient", $info);
    // load_view("listClient");
}

//Sửa thông tin thẻ ra-vào
function changeClientAction()
{
    $id = (int)$_GET['id'];
    $info_client = get_info_client_by_id($id);
    $data = array();
    $data['client'] = $info_client;
    global $Name, $Age, $Sex, $CitizenID;
    if (isset($_POST['btn-update'])) {
        $error = array();
        if (empty($_POST['Name'])) {
            $error['Name'] = 'Bạn cần điền Họ tên';
        } else {
            $Name = $_POST['Name'];
        }
        if (empty($_POST['Age'])) {
            $error['Age'] = 'Bạn cần điền tuổi';
        } else {
            $Age = $_POST['Age'];
        }
        // if (empty($_POST['Sex'])) {
        //     $error['Sex'] = 'Bạn cần điền giới tính';
        // } else {
        $Sex = $_POST['Sex'];
        // }
        if (empty($_POST['CitizenID'])) {
            $error['CitizenID'] = 'Bạn cần điền Căn cước công dân';
        } else {

            $CitizenID = $_POST['CitizenID'];
        }

        //Bắt đầu thêm
        if (empty($error)) {
            $data1 = array(
                'Name' => $Name,
                'Age' => $Age,
                'Sex' => $Sex,
                'CitizenID' => $CitizenID,
            );
            $where = "`id`={$id}";
            db_update('client', $data1, $where);
            $info_client = get_info_client_by_id($id);
            $data['client'] = $info_client;
            echo "<script type='text/javascript' >alert('Cập nhật thông tin khách hàng thành công!')</script>";
        }
    }
    load_view('changeClient', $data);
}

// Xóa khách hàng
function deleteClientAction()
{
    load_view('deleteClient');
}