<?php

//  require('libraries/PhpSpreadsheet/Spreadsheet.php');
// include './libraries/Classes/PHPExcel/IOFactory.php';
// require ('./libraries/Classes/PHPExcel.php');
function construct()
{
    load_model('index');
    // $list_users=get_list_users();
}
function accountLedgersAction()
{
    // lấy thông tin ngày tháng
    $date = getdate();
    $year = $date['year'];
    if($date['mon'] >= 7 && $date['mon'] <=12)
    {
        $day = "Từ 01/07/".$year ." đến 31/12/".$year;
    }
    else{
        $day = "Từ 01/01/".$year ." đến 30/06/".$year;
    }
    $id = (int)$_GET['id'];
    $data['day']=$day;
    $data['account'] = get_all_info_account_by_id($id);
    $data['data'] = get_data_account_by_id($id);
    $data['category'] = get_list_category();
    $data['list_ship'] = get_list_ship();
    $data['list_shareholder'] = get_list_shareholder();
    $data['sum_collect'] = get_sum_collect_account_by_id($id);
    $data['sum_spend'] = get_sum_spend_account_by_id($id);
    $data['dateSearch']=date('d/m/Y');
    global $account, $date, $cat_id, $money, $des, $spend,$ship_id,$shareholder_id, $error, $dateSearch;
    
    if (isset($_POST['btn-submit'])) {

        $error = array();
        $account = $id;
        if (empty($_POST['date'])) {
            $error['date'] = 'Bạn cần chọn ngày';
        } else {
            $date = $_POST['date'];
        }
        if (empty($_POST['cat_id'])) {
            $cat_id = $data['category'][0]['id'];
            $spend = get_id_spend_of_cat($cat_id);
        } else {
            $cat_id = $_POST['cat_id'];
            $spend = get_id_spend_of_cat($cat_id);
        }
        if(empty($_POST['money'])) {
            $error['money'] ="Bạn cần điền số tiền!";

        } else {
            $money = $_POST['money'];
        }
        // if (empty($_POST['money_1']) && empty($_POST['money_2'])) {
        //     $error['money'] = "Bạn cần nhập số tiền!";
        // } else {

        //     if (empty($_POST['money_1'])) {
        //         # code...
        //         $money = $_POST['money_2'];
        //     } else {
        //         $money = $_POST['money_1'];
        //     }
        // }
        $ship_id = $_POST['ship_id'];
        $shareholder_id = $_POST['shareholder_id'];
        if (empty($_POST['des'])) {
            $des = "";
        } else {

            $des = $_POST['des'];
        }
        
        if (empty($error)) {
            $data = array(
                'account' => $account,
                'date' => $date,
                'des' => $des,
                'cat_id' => $cat_id,
                'money' => $money,
                'idShip' =>$ship_id,
                'idHolder' => $shareholder_id,
                'spend' => $spend[0]['rev'],

            );
            db_insert('ledgers', $data);
            $data['account'] = get_all_info_account_by_id($id);
            $data['data'] = get_data_account_by_id($id);
            $data['category'] = get_list_category();
            $data['sum_collect'] = get_sum_collect_account_by_id($id);
            $data['sum_spend'] = get_sum_spend_account_by_id($id);
            echo "<script type='text/javascript' >alert('Thêm thu chi thành công!')</script>";
            redirect('?mod=ledgers&action=accountLedgers&id='.$id);
        }
    }

    // xem danh sách chi tiết trong 1 ngày
    if (isset($_POST['btn-search']))
    {
        
        if(empty($_POST['dateSearch']))
        {
            $data['day']=$day;
            $data['account'] = get_all_info_account_by_id($id);
            $data['data'] = get_data_account_by_id($id);
            $data['category'] = get_list_category();
            $data['list_ship'] = get_list_ship();
            $data['list_shareholder'] = get_list_shareholder();
            $data['sum_collect'] = get_sum_collect_account_by_id($id);
            $data['sum_spend'] = get_sum_spend_account_by_id($id);
            
            
        }
        else{
            $dateSearch = $_POST['dateSearch'];
            $data['day']=$day;
            $data['account'] = get_all_info_account_by_id($id);
            $data['data'] = get_data_account_by_id_on_date($id,change_date_for_sql($dateSearch));
            $data['category'] = get_list_category();
            $data['list_ship'] = get_list_ship();
            $data['list_shareholder'] = get_list_shareholder();
            $data['sum_collect'] = get_sum_collect_account_by_id($id);
            $data['sum_spend'] = get_sum_spend_account_by_id($id);
            $data['dateSearch'] = $dateSearch;
        }
       

    }

    load_view('accountLedgers', $data);
}
function update_ajaxAction()
{
    load_view('update_ajax');
}
function update_Ledger_ajaxAction()
{
    load_view('update_Ledger_ajax');
}
function shipLedgersAction()
{
    $data['ships'] = get_info_ships();
    $data['data'] = get_info_all_ships();
    $data['category'] = get_list_category();
    $data['sum_collect'] = get_sum_collect_all_ship();
    $data['sum_spend'] = get_sum_spend_of_ship();
    global $ship, $date, $cat_id, $money, $des, $spend, $error;
    if (isset($_POST['btn-submit'])) {

        $error = array();
        $ship = $_POST['ship'];
        if (empty($_POST['date'])) {
            $error['date'] = 'Bạn cần chọn ngày';
        } else {
            $date = $_POST['date'];
        }
        if (empty($_POST['cat_id'])) {
            $cat_id = $data['category'][0]['id'];
            $spend = get_id_spend_of_cat($cat_id);
        } else {
            $cat_id = $_POST['cat_id'];
            $spend = get_id_spend_of_cat($cat_id);
        }
        if (empty($_POST['money_1']) && empty($_POST['money_2'])) {
            $error['money'] = "Bạn cần nhập số tiền!";
        } else {

            if (empty($_POST['money_1'])) {
                # code...
                $money = $_POST['money_2'];
            } else {
                $money = $_POST['money_1'];
            }
        }
        if (empty($_POST['des'])) {
            $des = "";
        } else {

            $des = $_POST['des'];
        }


        if (empty($_POST['des'])) {
            $des = "";
        } else {

            $des = $_POST['des'];
        }
        if (empty($error)) {
            $data = array(
                'account' => $ship,
                'date' => $date,
                'des' => $des,
                'cat_id' => $cat_id,
                'money' => $money,
                'spend' => $spend[0]['rev'],

            );
            db_insert('ledgers', $data);
            $data['ships'] = get_info_ships();
            $data['data'] = get_info_all_ships();
            $data['category'] = get_list_category();
            $data['sum_collect'] = get_sum_collect_all_ship();
            $data['sum_spend'] = get_sum_spend_of_ship();
            echo "<script type='text/javascript' >alert('Thêm thu chi thành công!')</script>";
        }
    }
    load_view('shipLedgers', $data);
}



function changeAccountLedgersAction()
{
    $id = (int)$_GET['id'];
    $info_ledger = get_info_ledger_by_id($id);
    $data = array();
    $data['ledger'] = $info_ledger;
    // show_array($_POST);
    $data['category'] = get_list_category();
    global  $date, $cat_id, $money, $des, $spend, $error;
    if (isset($_POST['btn-update'])) {

        $error = array();
        if (empty($_POST['date'])) {
            $error['date'] = 'Bạn cần chọn ngày';
        } else {
            $date = $_POST['date'];
        }
        if (empty($_POST['cat_id'])) {
            $cat_id = $info_ledger['cat_id'];
            $spend = get_id_spend_of_cat($cat_id);
        } else {
            $cat_id = $_POST['cat_id'];
            $spend = get_id_spend_of_cat($cat_id);
        }
        if (empty($_POST['money_1']) && empty($_POST['money_2'])) {
            $error['money'] = "Bạn cần nhập số tiền!";
        } else {

            if ($info_ledger['spend'] == '1') {

                $money = $_POST['money_2'];
            } else if ($info_ledger['spend'] == '0') {

                $money = $_POST['money_1'];
            }
        }
        if (empty($_POST['des'])) {
            $des = $info_ledger['des'];
        } else {

            $des = $_POST['des'];
        }
        if (empty($error)) {
            $data1 = array(
                'date' => $date,
                'des' => $des,
                'cat_id' => $cat_id,
                'money' => $money,
                'spend' => $spend[0]['rev'],

            );
            // show_array($data);
            $where = "`id`={$id}";
            db_update('ledgers', $data1, $where);
            $info_ledger = get_info_ledger_by_id($id);
            $data['ledger'] = $info_ledger;
            $data['category'] = get_list_category();
            echo "<script type='text/javascript' >alert('Cập nhật thu chi thành công!')</script>";
            // sleep(2);    
            redirect('?mod=ledgers&action=accountLedgers');
            //    redirect();
        }
    }
    load_view('changeAccountLedgers', $data);
}

function changeShipLedgersAction()
{
    $id = (int)$_GET['id'];
    $info_ledger = get_info_ledger_by_id($id);
    $data = array();
    $data['ledger'] = $info_ledger;
    // show_array($_POST);
    $data['category'] = get_list_category();

    global  $date, $cat_id, $money, $des, $spend, $error;
    if (isset($_POST['btn-update'])) {

        $error = array();
        if (empty($_POST['date'])) {
            $error['date'] = 'Bạn cần chọn ngày';
        } else {
            $date = $_POST['date'];
        }
        if (empty($_POST['cat_id'])) {
            $cat_id = $info_ledger['cat_id'];
            $spend = get_id_spend_of_cat($cat_id);
        } else {
            $cat_id = $_POST['cat_id'];
            $spend = get_id_spend_of_cat($cat_id);
        }
        if (empty($_POST['money_1']) && empty($_POST['money_2'])) {
            $error['money'] = "Bạn cần nhập số tiền!";
        } else {

            if ($info_ledger['spend'] == '1') {

                $money = $_POST['money_2'];
            } else if ($info_ledger['spend'] == '0') {

                $money = $_POST['money_1'];
            }
        }
        if (empty($_POST['des'])) {
            $des = $info_ledger['des'];
        } else {

            $des = $_POST['des'];
        }
        if (empty($error)) {
            $data1 = array(
                'date' => $date,
                'des' => $des,
                'cat_id' => $cat_id,
                'money' => $money,
                'spend' => $spend[0]['rev'],

            );
            // show_array($data);
            $where = "`id`={$id}";
            db_update('ledgers', $data1, $where);
            $info_ledger = get_info_ledger_by_id($id);
            $data['ledger'] = $info_ledger;
            $data['category'] = get_list_category();
            echo "<script type='text/javascript' >alert('Cập nhật thu chi thành công!')</script>";
            // sleep(2);    
            redirect('?mod=ledgers&action=shipLedgers');
            //    redirect();
        }
    }
    load_view('changeShipLedgers', $data);
}

// Xuất file thống kê excel
function createFileExcelAction()
{
    
    // lấy thông tin ngày tháng
    $id = (int)$_GET['id'];
    $data =array();
    $data['account'] = get_all_info_account_by_id($id);
    $data['data'] = get_data_account_by_id($id);
    
load_view('createFileExcel',$data);
}


// xóa sổ thu chi
function deleteAccountLedgersAction()
{

    load_view('deleteAccountLedgers');
}
// xóa sổ thu chi
function deleteShipLedgersAction()
{

    load_view('deleteShipLedgers');
}
// đổi ship+id thì thay đổi cổ đông
function changeShipId_ajaxAction()
{
    load_view('changeShipId_ajax');
}
// import excel
function importExcelAction()
{
    load_view('importExcel');
}