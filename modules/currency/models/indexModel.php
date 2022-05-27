<?php 
function get_info_currencys()
{

    $currencys = db_fetch_array("SELECT * FROM `currency`");
    foreach ($currencys as &$item) 
    {
        $item['changeCurrency']="?mod=currency&action=changeCurrency&id={$item['id']}";
        $item['deleteCurrency']="?mod=currency&action=deleteCurrency&id={$item['id']}";

    }
   
    return $currencys;
}

// xoa tai khoan
function delete_currency($id)
    {
    $query="DELETE from `currency` where `id`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá tiền tệ thành công!')</script>";
    }
    // lay thông tin ship
 function get_info_currency_by_id($id)
    {
        $info=db_fetch_row("SELECT * FROM `currency` WHERE `id` = '{$id}' ");
        return $info;
    }


?>