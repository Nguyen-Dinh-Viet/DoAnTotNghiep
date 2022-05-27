<?php
function construct()
{
    load_model('index');
    // $list_users=get_list_users();
}
function listAccountAction()
{
    $data['accounts'] = get_info_accounts();
    load_view("listAccount", $data);
}
function addAccountAction()
{
    $info['banks'] = get_list_bank();
    $info['currency'] = get_list_currency();
    $info['ships'] = get_list_ship(); 
    global $name_account, $code, $bank, $currency, $amount,$ships;
    if (isset($_POST['btn-submit'])) {

        $error = array();
        if (empty($_POST['name_account'])) {
            $error['name_account'] = 'Bạn cần điền tên tài khoản ngân hàng';
        } else {
            $name_account = $_POST['name_account'];
        }
        if (empty($_POST['code'])) {
            $error['code'] = 'Bạn cần điền số tài khoản';
        } else {
            $code = $_POST['code'];
        }
        if (empty($_POST['bank'])) {
            $bank = $info['banks'][0]['id'];
        } else {

            $bank = $_POST['bank'];
        }
        if (empty($_POST['currency'])) {
            $currency = $info['currency'][0]['id'];
        } else {

            $currency = $_POST['currency'];
        }
        if (empty($_POST['amount'])) {
            $error['amount'] = "Bạn không được để trống trường này";
        } else {

            $amount = $_POST['amount'];
        }
        $ships =$_POST['ship'];
        if (empty($error)) {
            $data = array(
                'name' => $name_account,
                'code' => $code,
                'bank' => $bank,
                'currency' => $currency,
                'amount' =>$amount,
                'ship' => $ships,
            );
            db_insert('account', $data);
            echo "<script type='text/javascript' >alert('Thêm tài khoản ngân hàng thành công!')</script>";
        }
    }
    load_view("addAccount", $info);
}

function changeAccountAction()
{
    $id = (int)$_GET['id'];
    $info_account = get_info_account_by_id($id);
    $data = array();
    $data['account'] = $info_account;
    $data['banks'] = get_list_bank();
    $data['currency'] = get_list_currency();
    $data['ships'] = get_list_ship(); 
    global $name, $code, $bank, $currency, $amount;
    if (isset($_POST['btn-update'])) {

        $error = array();
        if (empty($_POST['name_account'])) {
            $error['name_account'] = "Bạn không được để trống trường này";
        } else {

            $name = $_POST['name_account'];
        }
        if (empty($_POST['code'])) {
            $error['code'] = 'Bạn không được để trống trường này';
        } else {
            $code = $_POST['code'];
        }
        if (empty($_POST['bank'])) {
            $bank = $info_account['bank'];
        } else {
            $bank = $_POST['bank'];
        }
        if (empty($_POST['currency'])) {
            $currency = $info_account['currency'];
        } else {
            $currency = $_POST['currency'];
        }
        if (empty($_POST['amount'])) {
            $error['amount'] = "Bạn không được để trống trường này";
        } else {

            $amount = $_POST['amount'];
        }
        $ships =$_POST['ship'];
        if (empty($error)) {
            $data1 = array(
                'name' => $name,
                'code' => $code,
                'bank' => $bank,
                'currency' => $currency,
                'amount' => $amount,
                'ship' => $ships,
            );
            // show_array($data);
            $where = "`id`={$id}";
            db_update('account', $data1, $where);
            $info_account = get_info_account_by_id($id);
            $data['account'] = $info_account;
            $data['banks'] = get_list_bank();
            $data['currency'] = get_list_currency();
            echo "<script type='text/javascript' >alert('Cập nhật ngân hàng thành công!')</script>";
            // sleep(2);

            //    redirect();
        }
    }
    load_view('changeAccount', $data);
}
// xóa ngân hàng
function deleteAccountAction()
{

    load_view('deleteAccount');
}
