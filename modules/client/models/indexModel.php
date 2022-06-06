<?php

//Lấy danh sách thông tin các khách hàng
function get_info_clients()
{
    $clients = db_fetch_array("SELECT cli.ID as ID, cli.Name as Name, cli.Age as Age, cli.Sex as Sex, cli.CitizenID as CitizenID, ca.CardNumber as CardID, cli.FaceID as FaceID FROM `client` as cli LEFT JOIN `card` as ca on ca.`ID` = cli.`CardID`;");
    foreach ($clients as &$item) {
        $item['changeClient'] = "?mod=client&action=changeClient&id={$item['ID']}";
        $item['deleteClient'] = "?mod=client&action=deleteClient&id={$item['ID']}";
    }

    return $clients;
}

//Lấy thông tin khách hàng theo ID
function get_info_client_by_id($id)
{
    $info = db_fetch_row("SELECT * FROM `client` WHERE `ID` = '{$id}' ");
    return $info;
}


// Lấy danh sách thẻ ra-vào
function get_list_card()
{
    $info = db_fetch_array("SELECT * FROM `card`");
    return $info;
}

//Xóa thẻ đăng kí
function delete_client($id)
{
    $query = "DELETE from `client` where `ID`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá khách hàng thành công!')</script>";
}