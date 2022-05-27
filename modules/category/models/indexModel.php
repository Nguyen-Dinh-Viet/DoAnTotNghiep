<?php 
function get_info_categorys()
{

    $categorys = db_fetch_array("SELECT * FROM `category`");
    foreach ($categorys as &$item) 
    {
        $item['changeCategory']="?mod=category&action=changeCategory&id={$item['id']}";
        $item['deleteCategory']="?mod=category&action=deleteCategory&id={$item['id']}";

    }
   
    return $categorys;
}

// xoa tai khoan
function delete_category($id)
    {
    $query="DELETE from `category` where `id`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá danh mục thành công!')</script>";
    }
    // lay thông tin category
 function get_info_category_by_id($id)
    {
        $info=db_fetch_row("SELECT * FROM `category` WHERE `id` = '{$id}' ");
        return $info;
    }


?>