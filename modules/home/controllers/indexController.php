<?php

function construct()
{
    load_model('index');
}
function indexAction()
{
    $data['data_vnd'] = get_all_data_collect_spent_vnd_on_months_in_year();
    $data['data_usd'] = get_all_data_collect_spent_usd_on_months_in_year();
    // $list_cat=get_list('tbl_list_cats');
    // $list_catalog=get_list('tbl_catalogs');
    // $list_product=get_list('tbl_products');
    // $list_image_banner=get_list_status('tbl_list_image_banner');
    // $adv=get_list_status('tbl_adv');
    // $list_pro_hight=get_list_product_highlight();
    // $list_pro_sold=get_list_product_sold();
 
    // // đổ dữ liệu của cả mảng cat -- catalog-product // mảng 3 chiều
    // // foreach ($list_cat as $item) {
    // //     # code...
    // //     $item['id']=array(get_list_catalog_by_id_list_cart($item['id']));
    // //     // foreach ($item['id'] as $item_temp) {
    // //     //     # code...
    // //     //     $item_temp['id']=array(get_list_product_by_id_catalog($item_temp['id']));
    // //     // }
        
    // // }
       
    // $data['list_catalog']=$list_catalog;
    // $data['list_cat']=$list_cat; 
    // $data['list_product']=$list_product;
    // $data['list_image_banner']=$list_image_banner;
    // $data['adv']=$adv;
    // $data['list_pro_sold']=$list_pro_sold;
    // $data['list_pro_hight']=$list_pro_hight;
    load_view('index',$data);

}
?>
