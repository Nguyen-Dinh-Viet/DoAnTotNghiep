<?php

//Lấy danh sách thông tin các lượt vào-ra
function get_info_accesscontrols()
{
    $accesscontrols = db_fetch_array("SELECT AC.ID, cardrfid.CardNumber, AC.LicensePlates,AC.FaceID,AC.LicensePlateID, AC.TimeIn, AC.TimeOut, client.Name
    FROM `accesscontrol` as AC
        LEFT JOIN `client` on AC.ClientID = client.ID
        LEFT JOIN `cardrfid` on AC.CardID = cardrfid.ID
        ORDER BY AC.TimeIn");
    foreach ($accesscontrols as &$item) {
        $item['detailAccesscontrol'] = "?mod=accesscontrol&action=detailAccesscontrol&id={$item['ID']}";
        $item['deleteAccesscontrol'] = "?mod=accesscontrol&action=deleteAccesscontrol&id={$item['ID']}";
    }
    return $accesscontrols;
}

//Lấy thông tin lịch sử vào-ra theo ID
function get_info_accesscontrol_by_id($id)
{
    $info = db_fetch_row("SELECT AC.ID, cardrfid.CardNumber, AC.LicensePlates, AC.TimeIn, AC.TimeOut, client.Name
    FROM `accesscontrol` as AC
        LEFT JOIN `client` on AC.ClientID = client.ID
        LEFT JOIN `cardrfid` on AC.CardID = cardrfid.ID
        WHERE AC.ID = '{$id}'
        ORDER BY AC.TimeIn");
    return $info;
}

// Lấy danh sách khách hàng
function get_list_client()
{
    $info = db_fetch_array("SELECT * FROM `client`");
    return $info;
}

// Lấy danh sách thẻ ra-vào
function get_list_card()
{
    $info = db_fetch_array("SELECT * FROM `cardrfid`");
    return $info;
}

//Xóa lịch sử vào-ra
function delete_accesscontrol($id)
{
    $query = "DELETE from `accesscontrol` where `ID`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá lịch sử ra-vào thành công!')</script>";
}