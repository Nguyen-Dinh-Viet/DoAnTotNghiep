<?php 
function get_info_accounts()
{

    $accounts = db_fetch_array("SELECT ac.id as id, ac.name as name, ac.code as code, ac.bank as id_bank, ac.currency as id_currency, ba.name as bank_name, cu.name as currency_name, ac.amount as amount, sh.name as ship_name, ac.ship as id_ship FROM `account` as ac LEFT JOIN `banks` as ba on ac.`bank` = ba.`id` LEFT JOIN `currency` as cu on ac.`currency` = cu.`id` LEFT JOIN `ships` as sh on ac.`ship` = sh.`id`");
    foreach ($accounts as &$item) 
    {
        $item['changeAccount']="?mod=account&action=changeAccount&id={$item['id']}";
        $item['deleteAccount']="?mod=account&action=deleteAccount&id={$item['id']}";

    }
   
    return $accounts;
}

// xoa tai khoan
function delete_account($id)
    {
    $query="DELETE from `account` where `id`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá tài khoản thành công!')</script>";
    }
    // lay thông tin account
 function get_info_account_by_id($id)
    {
        $info=db_fetch_row("SELECT * FROM `account` WHERE `id` = '{$id}' ");
        return $info;
    }

// Lấy danh sách ngân hàng
function get_list_bank()
{

    $info = db_fetch_array("SELECT * FROM `banks`");
   
    return $info;
}
// Lấy danh sách tiền tệ
function get_list_currency()
{

    $info = db_fetch_array("SELECT * FROM `currency`");
   
    return $info;
}
// Lấy danh sách tàu
function get_list_ship()
{

    $info = db_fetch_array("SELECT * FROM `ships`");
   
    return $info;
}
?>
