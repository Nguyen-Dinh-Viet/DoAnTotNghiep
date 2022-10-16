<?php

function construct()
{
    load_model('index');
}
function indexAction()
{
    // $data['data_vnd'] = get_all_data_collect_spent_vnd_on_months_in_year();
    // $data['data_usd'] = get_all_data_collect_spent_usd_on_months_in_year();
    load_view('homes');
}
function addCarCheckInAction()
{
    load_view('addCarCheckIn');
}
function addCarCheckOutAction()
{
    load_view('addCarCheckOut');
}
function addCarAction()
{
    global $RFIDcode, $license_plates, $ImageLicensePlates, $ImageFace, $Image_License_Plate_Base64, $Image_Face_Base64, $TimeIn;
    // if (isset($_POST['btn-submit'])) {

    // $error = array();
    // if (empty($_POST['RFIDcode'])) {
    //     $error['RFIDcode'] = 'Bạn cần điền số thẻ';
    // } else {
    //     $RFIDcode = $_POST['RFIDcode'];
    // }
    // if (empty($_POST['license_plates'])) {
    //     $error['license_plates'] = 'Bạn cần điền biển số xe';
    // } else {
    //     $license_plates = $_POST['license_plates'];
    // }
    // if (empty($_POST['TimeIn'])) {
    //     $error['TimeIn'] = 'Bạn cần nhập thời gian vào. Ví dụ: 14:24:08 09/09/2022';
    // } else {
    //     $TimeIn = $_POST['TimeIn'];
    // }

    // //Bắt đầu thêm
    // if (empty($error)) {
    //     $data = array(
    //         'RFIDcode' => $RFIDcode,
    //         'license_plates' => $license_plates,
    //         'ImageLicensePlates' => $ImageLicensePlates,
    //         'ImageFace' => $ImageFace,
    //     );
    //     db_insert('accesscontrol', $data);
    echo "<script type='text/javascript' >alert('Thêm thành công!')</script>";
    // }
    // }
    //load_view("homes");
}