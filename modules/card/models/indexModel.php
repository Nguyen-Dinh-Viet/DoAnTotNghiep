<?php

//Lấy danh sách thông tin các thẻ
function get_info_cards()
{
    $cards = db_fetch_array("SELECT * FROM `card`");
    foreach ($cards as &$item) {
        $item['changeCard'] = "?mod=card&action=changeCard&id={$item['ID']}";
        $item['deleteCard'] = "?mod=card&action=deleteCard&id={$item['ID']}";
    }

    return $cards;
}

//Lấy thông tin thẻ theo ID
function get_info_card_by_id($id)
{
    $info = db_fetch_row("SELECT * FROM `card` WHERE `ID` = '{$id}' ");
    return $info;
}

//Xóa thẻ đăng kí
function delete_card($id)
{
    $query = "DELETE from `card` where `ID`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá thẻ thành công!')</script>";
}