<?php
$RFIDcode = $_POST['RFIDcode_out'];
$license_plates = $_POST['license_plates_out'];
$TimeOut = $_POST['TimeOut'];
// $Image_License_Plate_Base64 = $_POST['Image_License_Plate_Base64_out'];
// $Image_Face_Base64 = $_POST['Image_Face_Base64_out'];
// Tìm thẻ RFID có tồn tại
$cardID = db_fetch_row("SELECT cardrfid.ID FROM `cardrfid` WHERE `cardNumber` = {$RFIDcode}");
if ($cardID['ID'] == null) {
    $data = array(
        'status' => "NoCardID",
    );
} else {
    // Tìm biển số xe có tồn tại theo mã thẻ và chưa ra khỏi bãi
    $query = "SELECT AC.*
                FROM accesscontrol as AC, cardrfid
                WHERE AC.TimeOut = '' AND AC.CardID = cardrfid.ID AND cardrfid.CardNumber = {$RFIDcode}";
    $license_check = db_fetch_array($query);
    // nếu không tồn tại
    if (count($license_check) == 0) {
        $data = array(
            'status' => "LicensePlateUnvalid",
        );
    }
    // Nếu khác với biển số đang kiểm tra 
    elseif ($license_check[0]['LicensePlates'] != $license_plates) {
        $data = array(
            'status' => "WrongLicensePlate",
        );
    }
    // Nếu đúng với biển số đang kiểm tra
    else {
        $data1 = array(
            // 'CardID' => $cardID['ID'],
            // 'LicensePlates' => $license_plates,
            // 'Image_License_Plate_Base64' => $Image_License_Plate_Base64,
            // 'FaceID' => $Image_Face_Base64,
            // 'TimeIn' => $TimeIn,
            'TimeOut' => $TimeOut,
            // 'ClientID' => $cardID,
        );
        $where = "`id`={$license_check[0]['ID']}";
        db_update('accesscontrol', $data1, $where);
        $data = array(
            'status' => "Success",
        );
    }
}
echo json_encode($data);