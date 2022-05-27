<?php 
function get_info_banks()
{

    $banks = db_fetch_array("SELECT * FROM `banks`");
    foreach ($banks as &$item) 
    {
        $item['changeBank']="?mod=bank&action=changeBank&id={$item['id']}";
        $item['deleteBank']="?mod=bank&action=deleteBank&id={$item['id']}";

    }
   
    return $banks;
}

// xoa tai khoan
function delete_bank($id)
    {
    $query="DELETE from `banks` where `id`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá ngân hàng thành công!')</script>";
    }
    // lay thông tin bank
 function get_info_bank_by_id($id)
    {
        $info=db_fetch_row("SELECT * FROM `banks` WHERE `id` = '{$id}' ");
        return $info;
    }


?>