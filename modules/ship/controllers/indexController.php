<?php
function construct()
{
    load_model('index');
    // $list_users=get_list_users();
}
function listShipAction()
{
    $data['ships'] = get_info_ships();
    load_view("listShip", $data);
}
function addShipAction()
{
    global $name_ship, $dateStart, $des, $type_ship, $number, $volume, $error;
    $data['list_ship'] = get_list_ship();
    if (isset($_POST['btn-submit'])) {

        $error = array();
        if (empty($_POST['name_ship'])) {
            $error['name_ship'] = 'Bạn cần điền tên tàu';
        } else {
            $name_ship = $_POST['name_ship'];
        }
        if (empty($_POST['des'])) {
            $des = "";
        } else {

            $des = $_POST['des'];
        }
        if (empty($_POST['type_ship'])) {
            $error['type_ship'] = 'Bạn cần điền loại tàu';
        } else {

            $type_ship = $_POST['type_ship'];
        }
        if (empty($_POST['number'])) {
            $error['number'] = 'Bạn cần điền mã hiệu tàu';
        } else {

            $number = $_POST['number'];
        }
        if (empty($_POST['volume'])) {
            $error['volume'] = 'Bạn cần chọn trọng tải tàu';
        } else {

            $volume = $_POST['volume'];
        }
        if (empty($_POST['dateStart'])) {
            $error['dateStart'] = "Bạn cần chọn ngày bắt đầu";
        } else {
            $dateStart = $_POST['dateStart'];
        }
        if (empty($error)) {
            $data = array(
                'name' => $name_ship,
                'dateStart' => $dateStart,
                'des' => $des,
                'number' =>$number,
                'volume' => $volume,
                'type' => $type_ship,
            );
            db_insert('ships', $data);
            echo "<script type='text/javascript' >alert('Thêm tàu thành công!')</script>";
        }
    }
    load_view("addShip");
}

function changeShipAction()
{
    $id = (int)$_GET['id'];
    $info_ship = get_info_ship_by_id($id);
    
    $data = array();
    $data['list_shareholder'] = get_list_shareholder();
    $data['ship'] = $info_ship;
    $data['shareholders']= get_list_shareholder_by_id($id);
    global $name, $dateStart, $des,$type_ship, $number, $volume, $info, $ratio, $shareholder_id, $error;
    if (isset($_POST['btn-update-ship'])) {

        $error = array();
        if (empty($_POST['name'])) {
            $error['name'] = "Bạn không được để trống trường này";
        } else {

            $name = $_POST['name'];
        }
        if (empty($_POST['type_ship'])) {
            $error['type_ship'] = 'Bạn cần điền loại tàu';
        } else {

            $type_ship = $_POST['type_ship'];
        }
        if (empty($_POST['number'])) {
            $error['number'] = 'Bạn cần điền mã hiệu tàu';
        } else {

            $number = $_POST['number'];
        }
        if (empty($_POST['volume'])) {
            $error['volume'] = 'Bạn cần chọn trọng tải tàu';
        } else {

            $volume = $_POST['volume'];
        }
        if (empty($_POST['des'])) {
            $des = "";
        } else {

            $des = $_POST['des'];
        }
        if (empty($_POST['dateStart'])) {
            $error['dateStart'] = "Bạn không được để trống trường này";
        } else {

            $dateStart = $_POST['dateStart'];
        }

        if (empty($error)) {
            $data1 = array(
                'name' => $name,
                'dateStart' => $dateStart,
                'des' => $des,
                'number' =>$number,
                'volume' => $volume,
                'type' => $type_ship,
            );
            // show_array($data);
            $where = "`id`={$id}";
            db_update('ships', $data1, $where);
            $info_ship = get_info_ship_by_id($id);
            $data['ship'] = $info_ship;
            echo "<script type='text/javascript' >alert('Cập nhật tàu thành công!')</script>";
            // sleep(2);

            //    redirect();
        }
    }
    if(isset($_POST['btn-add-shareholder']))
    {
        $error = array();
        if (empty($_POST['shareholder_id'])) {
            $shareholder_id = $data['list_shareholder'][0]['id'];
        } else {

            $shareholder_id = $_POST['shareholder_id'];
        }
        if (empty($_POST['ratio'])) {
            $error['ratio'] = 'Bạn cần điền phần trăm cổ phần';
        } else {

            $ratio = $_POST['ratio'];
        }
        if(!empty($_POST['info'])) {
            $info = $_POST['info'];
        }
        else{
            $info="";
        }
        if(empty($error))
        {
            $data2 = array(
                'idShip' => $id,
                'idHolder' => $shareholder_id,
                'ratio' => $ratio,
                'info' =>$info,
            );
           
            db_insert('holderShip', $data2);
            $data['shareholders']= get_list_shareholder_by_id($id);
        }
    }
    load_view('changeShip', $data);
}
// xóa tàu
function deleteShipAction()
{

    load_view('deleteShip');
}
// xóa cổ đông
function deleteShareHolderAction()
{

    load_view('deleteShareHolder');
}

// quản lý vận chuyển
function manageShipAction()
{
    global $date, $ship_id, $from_port, $to_port, $transport_company, $goods, $quantity,$currency, $price, $money, $note, $error;
    $list_ship = get_list_ship();
    $data['currency'] = get_list_currency();
    $data['data'] = get_list_transport();
    $data['list_ship'] = $list_ship;
    $data['error'] ="";
    if (isset($_POST['btn-submit'])) {

        $error = array();
        if (empty($_POST['date'])) {
            $error['date'] = 'Bạn cần chọn ngày';
        } else {
            $date = $_POST['date'];
        }
        if (empty($_POST['ship_id'])) {
            $ship_id = $list_ship[0].['id'];
        } else {

            $ship_id = $_POST['ship_id'];
        }
        if (empty($_POST['currency'])) {
            $currency = $data['currency'][0].['id'];
        } else {

            $currency= $_POST['currency'];
        }
        if (empty($_POST['from_port'])) {
            $error['from_port'] = 'Bạn cần điền cảng đi';
        } else {

            $from_port = $_POST['from_port'];
        }
        if (empty($_POST['to_port'])) {
            $error['to_port'] = 'Bạn cần điền cảng đến';
        } else {

            $to_port = $_POST['to_port'];
        }
        if (empty($_POST['transport_company'])) {
            $error['transport_company'] = 'Bạn cần điền công ty vận chuyển';
        } else {

            $transport_company = $_POST['transport_company'];
        }
        if (empty($_POST['goods'])) {
            $error['goods'] = "Bạn cần điền hàng hóa";
        } else {
            $goods = $_POST['goods'];
        }
        if (empty($_POST['quantity'])) {
            $error['quantity'] = "Bạn cần điền số lượng";
        } else {
            $quantity = $_POST['quantity'];
        }
        if (empty($_POST['quantity']) && empty($_POST['price']) &&empty($_POST['money'])) {
            $error['info'] = "Bạn đang điền thiếu thông tin ";
        } 
        if (!empty($_POST['price'])) {
           $price = $_POST['price'];
           $money = $quantity * $price;
        } 
        else{
            if(!empty($_POST['money']))
            {
                $money = $_POST['money'];
            }
           $price="";
        }
        if(!empty($_POST['note']))
        {
            $note = $_POST['note'];
        }
        else{
            $note ="";
        }
        if (empty($error)) {
            $data['error'] ="";
            $data1 = array(
                'date' => $date,
                'idShip' => $ship_id,
                'fromPort' => $from_port,
                'toPort' =>$to_port,
                'transportCompany' => $transport_company,
                'goods' => $goods,
                'quantity' => $quantity,
                'currency_id' => $currency,
                'price' => $price,
                'money' => $money,
                'note' =>$note, 
            );
            db_insert('transport', $data1);
            $data['data'] = get_list_transport();
            echo "<script type='text/javascript' >alert('Thêm chuyến vận chuyển thành công!')</script>";
            redirect('?mod=ship&action=manageShip');
        }
        else{
            $data['error'] = "Bạn điền thông tin chưa đúng";
        }
    }
    
    load_view('manageShip',$data);
}

// xóa vận chuyển
function deleteManageShipAction()
{

    load_view('deleteManageShip');
}
function get_manage_ship_ajaxAction()
{
    load_view('get_manage_ship_ajax');
}
function update_manage_ship_ajaxAction()
{
    load_view('update_manage_ship_ajax');
}
function update_ajaxAction()
{
    load_view('update_ajax');
}
function update_shareholder_ajaxAction()
{
    load_view('update_shareholder_ajax');
}

