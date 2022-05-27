<?php
//Lấy danh sách catalog từ id_list_cart
// function get_list_catalog_by_id_list_cart($id)
// {
//     $list_pro=array();
//     $query="SELECT * FROM `tbl_catalogs` WHERE `cat_id`='{$id}'";
//     $list_pro=db_fetch_array($query);
//     return $list_pro;
// }
//Lấy danh sách sản phẩm từ id_catalog
// function get_list_product_by_id_catalog($id)
// {
//     $list_pro=array();
//     $query="SELECT * FROM `tbl_products` WHERE `catalog_id`='{$id}'";
//     $list_pro=db_fetch_array($query);
//     return $list_pro;
// }
// Lấy danh sách sản phẩm của từng list cat
// function get_list_product_by_id_list_cat($id)
// {
//     $list_pro=array();
//     $query="SELECT `tbl_products`.`id`,`tbl_products`.`name`, `tbl_products`.`image_link`,`tbl_products`.`price`,`tbl_products`.`old_price` FROM `tbl_catalogs` join `tbl_list_cats` on `tbl_catalogs`.`cat_id`=`tbl_list_cats`.`id` join `tbl_products` on `tbl_catalogs`.`id`=`tbl_products`.`catalog_id` WHERE `tbl_list_cats`.`id`='{$id}'
//      LIMIT 0,8";
//     $list_pro=db_fetch_array($query);
//     return $list_pro;
// }
// function get_list_20_product_by_id_list_cat($id,$num)
// {
//     $list_pro=array();
//     $query="SELECT `tbl_products`.`id`, `tbl_products`.`name`, `tbl_products`.`image_link`,`tbl_products`.`price`,`tbl_products`.`old_price` FROM `tbl_catalogs` join `tbl_list_cats` on `tbl_catalogs`.`cat_id`=`tbl_list_cats`.`id` join `tbl_products` on `tbl_catalogs`.`id`=`tbl_products`.`catalog_id` WHERE `tbl_list_cats`.`id`='{$id}'
//      LIMIT {$num},20";
//     $list_pro=db_fetch_array($query);
//     return $list_pro;
// }

// function get_id_cart()
// {
//     $cat_id=(int)$_GET['cat_id'];
//     return  $cat_id;
// }

// đếm số trang brum
// function count_brum($number)
// {
//     $count =(int)($number/50);
//     $temp=$number-50*$count;
//     if($temp>0)
//     $count+=1;
//     return $count;
// }
//  lấy số liệu  của 1 sản phẩm
// function get_info_pro_by_id($id)
// {
    
//     $query="SELECT * FROM `tbl_products` WHERE `id`='{$id}'";
//     $info_pro=db_fetch_row($query);
    
//             $info_pro['url_add_cart']="?mod=cart&act=add&id={$id}";
//             $info_pro['url']="?mod=page&act=detail&id={$id}";
            
     
//     return $info_pro;
// }
// function get_list_image_pro($id)
// {
//     $list_link=array();
//     $query="SELECT * FROM `tbl_list_image_products` WHERE `id_products`='{$id}'";
//     $list_link=db_fetch_array($query);
//     return $list_link;
// }
// function currentcy_format($number,$unit='đ')
//     {
//         return number_format($number).$unit;
//     }

// //đếm số trang của blog
// function count_brum_blog($num)
// {
//     $count =(int)($num/6);
//     $temp=$num-6*$count;
//     if($temp>0)
//     $count+=1;
//     return $count;
// }
// lấy 6 trang blog
// function get_list_6_blog($num_brum)
// {
//     $list_blog=array();
//     $query="SELECT * FROM `tbl_blog` ORDER by `create_date` DESC LIMIT {$num_brum},6 ";
//     $list_blog=db_fetch_array($query);
//     return $list_blog;
// }
// thay đổi thời gian
// function time_format($date)
// {
//     $temp_1=substr($date,0,4);
//     $temp_2=substr($date,5,2);
//     $temp_3=substr($date,8,2);
//     return $temp_3."/".$temp_2."/".$temp_1;
// }
// lấy thông tin của 1 blog
// function get_info_blog_by_id($id)
// {
//     $query="SELECT * FROM `tbl_blog` WHERE `id_blog`='{$id}'";
//     $info_blog=db_fetch_row($query);
//     return $info_blog;
// }
?>