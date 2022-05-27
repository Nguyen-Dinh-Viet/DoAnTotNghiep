<?php

function construct()
{
    load_model('index');
}
function generalAction()
{
    $data['category'] = get_list_category();
    $data['list_ship'] = get_list_ship();
    $data['data']=array();
    $data['sum_vnd']=0;
    $data['sum_usd']=0;
    global $cat_id,$ship_id,$from,$to,$error;
    if(isset($_POST['btn-search-report']))
    {
        $error =array();
        if(empty($_POST['cat_id']))
        {
            $cat_id = $data['category'][0]['id'];
        }
        else{
            $cat_id=$_POST['cat_id'];
        }
        if(empty($_POST['ship_id']))
        {
            $ship_id = $data['list_ship'][0]['id'];
        }
        else{
            $ship_id=$_POST['ship_id'];
        }
        if(empty($_POST['from_date']))
        {
            $error['date'] ="Xin mời bạn chọn ngày!";
        }
        else{
            $from =$_POST['from_date'];
        }
        if(empty($_POST['to_date']))
        {
            $error['date'] ="Xin mời bạn chọn ngày!";
        }
        else{
            $to =$_POST['to_date'];
        }
        if(empty($error))
        {
            $data_all = get_list_info_general($cat_id,$ship_id,$from,$to);
            foreach ($data_all as $item) {
                # code...
                if($item['currency'] =='1')
                {
                    $data['sum_vnd'] = $data['sum_vnd'] +$item['tien_vnd'];
                }
                else{
                    $data['sum_usd'] = $data['sum_usd'] +$item['tien_usd'];
                }
            }
            $data['data']=$data_all;
        }
        
    }
    load_view('general', $data);
}
function indexAction()
{
   // $data =array();
    $data['data'] = array();
    $data['sum_vnd']=0;
    $data['sum_usd']=0;
    global $from, $to,$error;
    $sum_vnd = 0;
    $sum_usd=0;
    if(isset($_POST['btn-search-report']))
    {
        $error = array();
        if(empty($_POST['from_date']))
        {
            $error['date'] ="Xin mời bạn chọn ngày!";
        }
        else{
            $from =$_POST['from_date'];
        }
        if(empty($_POST['to_date']))
        {
            $error['date'] ="Xin mời bạn chọn ngày!";
        }
        else{
            $to =$_POST['to_date'];
        }
        if(empty($error))
        {
            $data_all = get_list_shareholder($from,$to);
        }
        
        foreach ($data_all as $item) {
            # code...
            $sum_vnd= $sum_vnd + $item['tong_tien_vnd'];
            $sum_usd= $sum_usd + $item['tong_tien_USD'];
        }
        $data['data'] = $data_all;
        $data['sum_vnd'] = $sum_vnd;
        $data['sum_usd'] = $sum_usd;
        
    };
   
    if(isset($_POST['btnExport']))
    {
        load_view('createFileExcel',$data);
    };
    load_view('index',$data);
}
// Xuất file thống kê excel
// function createFileExcelAction()
// {
//     $data['data'] = array();
//     $data['sum_vnd']=0;
//     $data['sum_usd']=0;
//     // lấy thông tin ngày tháng
    
    
// load_view('createFileExcel',$data);
// }
function watch_detail_ajaxAction()
{
    load_view('watch_detail_ajax');
}
function revenueShipAction()
{
    global $error, $from,$to;
    $data =array(
        'data_vnd' => array(),
        'data_usd' =>array(),
        'sum_collect_vnd' =>0,
        'sum_spend_vnd' =>0,
        'sum_collect_usd' =>0,
        'sum_spend_usd' =>0,
    );
    if (isset($_COOKIE['username'])) {
        $email = $_COOKIE['username'];
    } else {
        $email = $_SESSION['user_login'];
    }
    $info_user = get_info_user_by_email($email);
    if(isset($_POST['btn-search-report']))
        {
            
            $error=array();
            if(empty($_POST['from_date']))
            {
                $error['date'] = 'Bạn cần chọn ngày';
            }
            else {
                $from =$_POST['from_date'];
            }
            if(empty($_POST['to_date']))
            {
                $error['date'] = 'Bạn cần chọn ngày';
            }
            else {
                $to =$_POST['to_date'];
            }
            if(empty($error))
            {    
                if($info_user['user_role_id'] == '2')
                {
                $data_vnd = get_list_revenue_ships_of_holder_VND($info_user['id'],$from,$to);
                $data_usd =get_list_revenue_ships_of_holder_USD($info_user['id'],$from,$to);
                }
                else{
                $data_vnd = get_list_revenue_ships_VND($from,$to);
                $data_usd =get_list_revenue_ships_USD($from,$to);
                }
                $sum_collect_vnd=0;
                $sum_spend_usd=0;
                $sum_collect_usd=0;
                $sum_spend_vnd=0;
                foreach ($data_vnd as $item) {
                    # code...
                    $sum_collect_vnd = $sum_collect_vnd+$item['Tong_thu_vnd'];
                    $sum_spend_vnd=$sum_spend_vnd+$item['Tong_chi_vnd'];
                }
                foreach ($data_usd as $item) {
                    # code...
                    $sum_collect_usd = $sum_collect_usd+$item['Tong_thu_usd'];
                    $sum_spend_usd=$sum_spend_usd+$item['Tong_chi_usd'];
                }
                   $data=array(
                       'data_vnd'=>$data_vnd,
                       'data_usd'=>$data_usd,   
                       'sum_collect_vnd' =>$sum_collect_vnd,
                        'sum_spend_vnd' =>$sum_spend_vnd,
                        'sum_collect_usd' =>$sum_collect_usd,
                        'sum_spend_usd' =>$sum_spend_usd,         
                   );
            }
        }
    load_view('revenueShip',$data);
}

function watch_revenue_ajaxAction()
{
    load_view('watch_revenue_ajax');
}
function oilShipAction()
{
    global $error, $from,$to;
    $data =array(
        'data_vnd' => array(),
        'data_usd' =>array(),
        'sum_vnd'=>0,
        'sum_usd' =>0
    );
    if(isset($_POST['btn-search-report']))
        {
            
            $error=array();
            if(empty($_POST['from_date']))
            {
                $error['date'] = 'Bạn cần chọn ngày';
            }
            else {
                $from =$_POST['from_date'];
            }
            if(empty($_POST['to_date']))
            {
                $error['date'] = 'Bạn cần chọn ngày';
            }
            else {
                $to =$_POST['to_date'];
            }
            if(empty($error))
            {    
                $data_vnd = get_list_oil_ships_VND($from,$to);
                $data_usd =get_list_oil_ships_USD($from,$to);
                $sum_vnd =0;
                $sum_usd=0;
                foreach ($data_vnd as $item) {
                    # code...
                    $sum_vnd=$sum_vnd + $item['Tong_tien_vnd'];
                }
                foreach ($data_usd as $item) {
                    # code...
                    $sum_usd=$sum_usd + $item['Tong_tien_usd'];
                }
                   $data=array(
                       'data_vnd'=>$data_vnd,
                       'data_usd'=>$data_usd, 
                       'sum_vnd'=>$sum_vnd,
                        'sum_usd' =>$sum_usd       
                   );
            }
        }
    load_view('oilShip',$data);
}
function watch_oil_ajaxAction()
{
    load_view('watch_oil_ajax');
}
function salaryHolderAction()
{
    global $error, $from,$to;
    $data =array(
        'data_vnd' => array(),
        'data_usd' =>array(),
        'sum_vnd'=>0,
        'sum_usd' =>0
    );
    if(isset($_POST['btn-search-report']))
        {
            
            $error=array();
            if(empty($_POST['from_date']))
            {
                $error['date'] = 'Bạn cần chọn ngày';
            }
            else {
                $from =$_POST['from_date'];
            }
            if(empty($_POST['to_date']))
            {
                $error['date'] = 'Bạn cần chọn ngày';
            }
            else {
                $to =$_POST['to_date'];
            }
            if(empty($error))
            {    
                $data_vnd = get_list_salary_holders_VND($from,$to);
                $data_usd =get_list_salary_holders_USD($from,$to);
                $sum_vnd =0;
                $sum_usd=0;
                foreach ($data_vnd as $item) {
                    # code...
                    $sum_vnd=$sum_vnd + $item['Tong_luong_vnd'];
                }
                foreach ($data_usd as $item) {
                    # code...
                    $sum_usd=$sum_usd + $item['Tong_luong_usd'];
                }
                   $data=array(
                       'data_vnd'=>$data_vnd,
                       'data_usd'=>$data_usd,    
                       'sum_vnd'=>$sum_vnd,
                       'sum_usd' =>$sum_usd          
                   );
            }
        }
    load_view('salaryHolder',$data);
}
function watch_salary_ajaxAction()
{
    load_view('watch_salary_ajax');
}
function interestHolderAction()
{
    global $error, $from,$to;
    $data =array(
        'data_vnd' => array(),
        'data_usd' =>array(),
        'sum_vnd'=>0,
        'sum_usd' =>0
    );
    if(isset($_POST['btn-search-report']))
        {
            
            $error=array();
            if(empty($_POST['from_date']))
            {
                $error['date'] = 'Bạn cần chọn ngày';
            }
            else {
                $from =$_POST['from_date'];
            }
            if(empty($_POST['to_date']))
            {
                $error['date'] = 'Bạn cần chọn ngày';
            }
            else {
                $to =$_POST['to_date'];
            }
            if(empty($error))
            {    
                $data_vnd = get_list_interest_holders_VND($from,$to);
                $data_usd =get_list_interest_holders_USD($from,$to);
                $sum_vnd =0;
                $sum_usd=0;
                foreach ($data_vnd as $item) {
                    # code...
                    $sum_vnd=$sum_vnd + $item['Tong_chi_lai_vnd'];
                }
                foreach ($data_usd as $item) {
                    # code...
                    $sum_usd=$sum_usd + $item['Tong_chi_lai_usd'];
                }
                   $data=array(
                       'data_vnd'=>$data_vnd,
                       'data_usd'=>$data_usd,  
                       'sum_vnd'=>$sum_vnd,
                       'sum_usd' =>$sum_usd            
                   );
            }
        }
    load_view('interestHolder',$data);
}
function watch_interest_ajaxAction()
{
    load_view('watch_interest_ajax');
}
?>