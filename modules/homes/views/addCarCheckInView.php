<?php
$RFIDcode = $_POST['RFIDcode'];
$license_plates = $_POST['license_plates'];
$TimeIn = $_POST['TimeIn'];
$Image_License_Plate_Base64 = $_POST['Image_License_Plate_Base64'];
$Image_Face_Base64 = $_POST['Image_Face_Base64'];
$cardID = db_fetch_row("SELECT cardrfid.ID FROM `cardrfid` WHERE `cardNumber` = {$RFIDcode}");
$data1 = array(
    'CardID' => $cardID['ID'],
    'LicensePlates' => $license_plates,
    // 'Image_License_Plate_Base64' => $Image_License_Plate_Base64,
    'FaceID' => $Image_Face_Base64,
    'TimeIn' => $TimeIn,
    // 'TimeOut' => $TimeIn,
    // 'ClientID' => $cardID,
);
db_insert('accesscontrol', $data1);

$data = array(
    'status' => 'addad',
);
echo json_encode($data);