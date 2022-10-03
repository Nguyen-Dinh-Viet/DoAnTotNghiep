<?php

//Lấy danh sách thông tin các thẻ
function get_info_cards()
{
    $cards = db_fetch_array("SELECT * FROM `cardrfid`");
    foreach ($cards as &$item) {
        $item['changeCardRFID'] = "?mod=cardrfid&action=changeCardRFID&id={$item['ID']}";
        $item['deleteCardRFID'] = "?mod=cardrfid&action=deleteCardRFID&id={$item['ID']}";
    }

    return $cards;
}

//Lấy thông tin thẻ theo ID
function get_info_card_by_id($id)
{
    $info = db_fetch_row("SELECT * FROM `cardrfid` WHERE `ID` = '{$id}' ");
    return $info;
}

//Xóa thẻ đăng kí
function delete_card($id)
{
    $query = "DELETE from `cardrfid` where `ID`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá thẻ thành công!')</script>";
}