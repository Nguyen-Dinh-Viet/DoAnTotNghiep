<?php 
// function get_info_accounts()
// {
//     $data =array();
//     $accounts = db_fetch_array("SELECT ac.id as id, ac.name as name, ac.code as code, ac.bank as id_bank, ac.currency as id_currency, ba.name as bank_name, cu.name as currency_name, ac.amount as amount FROM `account` as ac LEFT JOIN `banks` as ba on ac.`bank` = ba.`id` LEFT JOIN `currency` as cu on ac.`currency` = cu.`id` WHERE ac.`ship` = '0'" );  
//     foreach ($accounts as $item) {
//         # code...
//         $data["{$item['id']}"] = $item;
//     }
//     return $data;
// }


// Lấy thông tin đầy đủ 1 account
function get_all_info_account_by_id($id) {
    $account = db_fetch_row("SELECT ac.id as id, ac.name as name, ac.code as code, ac.bank as id_bank, ac.currency as id_currency, ba.name as bank_name, cu.name as currency_name, ac.amount as amount FROM `account` as ac LEFT JOIN `banks` as ba on ac.`bank` = ba.`id` LEFT JOIN `currency` as cu on ac.`currency` = cu.`id` WHERE ac.`ship` = '0' and ac.`id` ='{$id}'" );  
    return $account;
}

function get_data_account_by_id($id)
{
    $date = getdate();
    if($date['mon']>=7 && $date['mon'] <=12  )
        {
            $data =db_fetch_array("SELECT le.id as id, le.date as date, le.des as des, le.account as account, le.cat_id as cat_id, le.money as money, le.spend as spend, ca.name as cat_name, ca.des as cat_des, sh.name as name_ship, us.user_fname as user_fname, us.user_mname as user_mname, us.user_lname as user_lname FROM `ledgers` as le LEFT JOIN `category` as ca on le.cat_id = ca.id LEFT JOIN `ships` as sh on le.idShip = sh.id LEFT JOIN `users` as us on le.idHolder = us.id WHERE `account` = '{$id}' and MONTH(le.date) BETWEEN '7' and '12' and YEAR(le.date) =YEAR(NOW()) order by `date` desc");
        }
        else{
            $data =db_fetch_array("SELECT le.id as id, le.date as date, le.des as des, le.account as account, le.cat_id as cat_id, le.money as money, le.spend as spend, ca.name as cat_name, ca.des as cat_des, sh.name as name_ship, us.user_fname as user_fname, us.user_mname as user_mname, us.user_lname as user_lname FROM `ledgers` as le LEFT JOIN `category` as ca on le.cat_id = ca.id LEFT JOIN `ships` as sh on le.idShip = sh.id LEFT JOIN `users` as us on le.idHolder = us.id WHERE `account` = '{$id}' and MONTH(le.date) BETWEEN '1' and '6' and YEAR(le.date) =YEAR(NOW()) order by `date` desc");
        }
    return $data;
}
function get_data_account_by_id_on_date($id, $date)
{
    $data =db_fetch_array("SELECT le.id as id, le.date as date, le.des as des, le.account as account, le.cat_id as cat_id, le.money as money, le.spend as spend, ca.name as cat_name, ca.des as cat_des, sh.name as name_ship, us.user_fname as user_fname, us.user_mname as user_mname, us.user_lname as user_lname FROM `ledgers` as le LEFT JOIN `category` as ca on le.cat_id = ca.id LEFT JOIN `ships` as sh on le.idShip = sh.id LEFT JOIN `users` as us on le.idHolder = us.id WHERE `account` = '{$id}' and le.date = '{$date}'");
    return $data;
}
// function get_info_all_accounts()
// {
//     $date = getdate();
//     $data =array();
//     $accounts = db_fetch_array("SELECT ac.id as id, ac.name as name, ac.code as code, ac.bank as id_bank, ac.currency as id_currency, ba.name as bank_name, cu.name as currency_name FROM `account` as ac LEFT JOIN `banks` as ba on ac.`bank` = ba.`id` LEFT JOIN `currency` as cu on ac.`currency` = cu.`id` WHERE ac.`ship` = '0'");  
//     foreach ($accounts as $item) {
//         if($date['mon']>=7 && $date['mon'] <=12  )
//         {
//             $temp =db_fetch_array("SELECT le.id as id, le.date as date, le.des as des, le.account as account, le.cat_id as cat_id, le.money as money, le.spend as spend, ca.name as cat_name, ca.des as cat_des FROM `ledgers` as le LEFT JOIN `category` as ca on le.cat_id = ca.id  WHERE `account` = '{$item['id']}' and MONTH(le.date) BETWEEN '7' and '12' and YEAR(le.date) =YEAR(NOW()) order by `date` desc");
//         }
//         else{
//             $temp =db_fetch_array("SELECT le.id as id, le.date as date, le.des as des, le.account as account, le.cat_id as cat_id, le.money as money, le.spend as spend, ca.name as cat_name, ca.des as cat_des FROM `ledgers` as le LEFT JOIN `category` as ca on le.cat_id = ca.id  WHERE `account` = '{$item['id']}' and MONTH(le.date) BETWEEN '1' and '6' and YEAR(le.date) =YEAR(NOW()) order by `date` desc");
//         }
        
       
//         $data["{$item['id']}"] = $temp;

//         # code...
//     }
//     return $data;
// }
function get_info_ships()
{
    $data =array();
    $accounts = db_fetch_array("SELECT ac.id as id, ac.name as name, ac.code as code, ac.bank as id_bank, ac.currency as id_currency, ba.name as bank_name, cu.name as currency_name, ac.amount as amount, sh.name as ship_name FROM `account` as ac LEFT JOIN `banks` as ba on ac.`bank` = ba.`id` LEFT JOIN `currency` as cu on ac.`currency` = cu.`id` LEFT JOIN `ships` as sh on ac.`ship` = sh.`id` WHERE ac.`ship` != '0'" );  
    foreach ($accounts as $item) {
        # code...
        $data["{$item['id']}"] = $item;
    }
    return $data;
}
function get_info_all_ships()
{
    $date = getdate();
    $data =array();
    $accounts = db_fetch_array("SELECT ac.id as id, ac.name as name, ac.code as code, ac.bank as id_bank, ac.currency as id_currency, ba.name as bank_name, cu.name as currency_name FROM `account` as ac LEFT JOIN `banks` as ba on ac.`bank` = ba.`id` LEFT JOIN `currency` as cu on ac.`currency` = cu.`id` LEFT JOIN `ships` as sh on ac.`ship` = sh.`id` WHERE ac.`ship` != '0'");  
    foreach ($accounts as $item) {
        if($date['mon']>=7 && $date['mon'] <=12  )
        {
            $temp =db_fetch_array("SELECT le.id as id, le.date as date, le.des as des, le.account as account, le.cat_id as cat_id, le.money as money, le.spend as spend, ca.name as cat_name, ca.des as cat_des FROM `ledgers` as le LEFT JOIN `category` as ca on le.cat_id = ca.id  WHERE `account` = '{$item['id']}' and MONTH(le.date) BETWEEN '7' and '12' and YEAR(le.date) =YEAR(NOW()) order by `date` desc");
        }
        else{
            $temp =db_fetch_array("SELECT le.id as id, le.date as date, le.des as des, le.account as account, le.cat_id as cat_id, le.money as money, le.spend as spend, ca.name as cat_name, ca.des as cat_des FROM `ledgers` as le LEFT JOIN `category` as ca on le.cat_id = ca.id  WHERE `account` = '{$item['id']}' and MONTH(le.date) BETWEEN '1' and '6' and YEAR(le.date) =YEAR(NOW()) order by `date` desc");
        }
       
        $data["{$item['id']}"] = $temp;

        # code...
    }
    return $data;
}

// lấy thông tin 1 account ledger
function get_info_ledger_by_id($id)
{
    $info = db_fetch_row("SELECT le.id as id, le.date as date, le.des as des, le.money as money, le.spend as spend, le.cat_id as cat_id, ca.name as cate_name, sh.name as ship_name, sh.id as ship_id, us.id as user_id, us.user_fname as username FROM `ledgers` as le LEFT JOIN `users` as us on le.idHolder = us.id LEFT JOIN `ships` as sh on le.idShip = sh.id LEFT JOIN `category` as ca on le.cat_id = ca.id where le.id = '{$id}'");
    return $info;
}
// xoa tai khoan
function delete_account_ledger($id)
    {
    $query="DELETE from `ledgers` where `id`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá khoản thu chi thành công!')</script>";
    }
    // lay thông tin account
 function get_info_account_by_id($id)
    {
        $info=db_fetch_row("SELECT * FROM `account` WHERE `id` = '{$id}' ");
        return $info;
    }
// Lấy danh sách loại thu chi
function get_list_category()
{

    $info = db_fetch_array("SELECT * FROM `category`");
   
    return $info;
}
// Lấy danh sách tàu
function get_list_ship()
{

    $info = db_fetch_array("SELECT * FROM `ships`");
   
    return $info;
}
// Lấy danh sách cổ đông
function get_list_shareholder()
{

    $info = db_fetch_array("SELECT * FROM `users` where `user_role_id` = '2'");
   
    return $info;
}
// Lấy id thu chi 
function get_id_spend_of_cat($cat_id)
{
    $id_spend = db_fetch_array("SELECT `rev` FROM `category` where `id` = '$cat_id'");
    return $id_spend;
}
//Tính tổng khoản  thu của 1 tài khoản ngân hàng
function get_sum_collect_account_by_id($id)
{
    $date = getdate();
    if($date['mon']>=7 && $date['mon'] <=12  )
        {
            $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers`  WHERE `spend` = '0' and `account`='{$id}' and MONTH(date) BETWEEN '7' and '12' and YEAR(date) =YEAR(NOW())");
        }
        else{
            $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers`  WHERE `spend` = '0' and `account`='{$id}' and MONTH(date) BETWEEN '1' and '6' and YEAR(date) =YEAR(NOW())");
        }
    return $result;
}

// Tính tổng khoản thu của các tài khoản ngân hàng
// function get_sum_collect_all_account()
// {
//     $date = getdate();
//     $accounts = db_fetch_array("SELECT * FROM `account` WHERE `ship` = '0'");  
//     foreach ($accounts as $item) {
//         # code...
//         if($date['mon']>=7 && $date['mon'] <=12  )
//         {
//             $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers`  WHERE `spend` = '0' and `account`='{$item['id']}' and MONTH(date) BETWEEN '7' and '12' and YEAR(date) =YEAR(NOW())");
//         }
//         else{
//             $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers`  WHERE `spend` = '0' and `account`='{$item['id']}' and MONTH(date) BETWEEN '1' and '6' and YEAR(date) =YEAR(NOW())");
//         }
//         $data["{$item['id']}"] = $result;
//     }
    
//     return $data;
// }

//Tính tổng khoản chi của 1 tài khoản theo id
function get_sum_spend_account_by_id($id)
{
    $date = getdate();
    if($date['mon']>=7 && $date['mon'] <=12  )
        {
            $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers` WHERE `spend` = '1' and `account`='{$id}' and MONTH(date) BETWEEN '7' and '12' and YEAR(date) =YEAR(NOW())");
        }
        else{
            $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers` WHERE `spend` = '1' and `account`='{$id}' and MONTH(date) BETWEEN '1' and '6' and YEAR(date) =YEAR(NOW())");
        }
    return $result;
} 

// Tính tổng khoản chi của các tài khoản ngân hàng
// function get_sum_spend_of_account()
// {
//     $date = getdate();
//     $accounts = db_fetch_array("SELECT * FROM `account` WHERE `ship` = '0'");  
//     foreach ($accounts as $item) {
//         # code...
//         if($date['mon']>=7 && $date['mon'] <=12  )
//         {
//             $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers` WHERE `spend` = '1' and `account`='{$item['id']}' and MONTH(date) BETWEEN '7' and '12' and YEAR(date) =YEAR(NOW())");
//         }
//         else{
//             $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers` WHERE `spend` = '1' and `account`='{$item['id']}' and MONTH(date) BETWEEN '1' and '6' and YEAR(date) =YEAR(NOW())");
//         }
//         $data["{$item['id']}"] = $result;
//     }
    
//     return $data;
// }
// Tính tổng khoản thu của các tàu
function get_sum_collect_all_ship()
{
    $date = getdate();
    $accounts = db_fetch_array("SELECT * FROM `account` WHERE `ship` != '0'");  
    foreach ($accounts as $item) {
        # code...
        if($date['mon']>=7 && $date['mon'] <=12  )
        {
            $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers` WHERE `spend` = '0' and `account`='{$item['id']} ' and MONTH(date) BETWEEN '7' and '12' and YEAR(date) =YEAR(NOW())");
        }
        else{
            $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers` WHERE `spend` = '0' and `account`='{$item['id']} ' and MONTH(date) BETWEEN '1' and '6' and YEAR(date) =YEAR(NOW())");
        }
        $data["{$item['id']}"] = $result;
    }
    
    return $data;
}
// Tính tổng khoản chi của các tàu
function get_sum_spend_of_ship()
{
    $date = getdate();
    $accounts = db_fetch_array("SELECT * FROM `account` WHERE `ship` != '0'");  
    foreach ($accounts as $item) {
        # code...
        if($date['mon']>=7 && $date['mon'] <=12  )
        {
            $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers` WHERE `spend` = '1' and `account`='{$item['id']}' and MONTH(date) BETWEEN '7' and '12' and YEAR(date) =YEAR(NOW())");
        }
        else{
            $result=db_fetch_row("SELECT SUM(money) as sum FROM `ledgers` WHERE `spend` = '1' and `account`='{$item['id']}' and MONTH(date) BETWEEN '1' and '6' and YEAR(date) =YEAR(NOW())");
        }
        $data["{$item['id']}"] = $result;
    }
    
    return $data;
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
// Lấy danh sách cổ đông của 1 tàu
function get_list_shareholder_by_id($id)
{
    $list = db_fetch_array("SELECT * FROM `holdership` as ho, `users` as us WHERE us.`id` = ho.`idHolder` and  `idShip` = '{$id}' ");
    return $list;
}


////// Importr excel
function checkAccountInDB($name)
{
    $num_rows = db_num_rows("SELECT * from `account` where `name` = '{$name}'");
    if($num_rows >0)
    return true;
    return false;
}
function checkCategoryInDB($name)
{
    $num_rows = db_num_rows("SELECT * from `category` where `name` = '{$name}'");
    if($num_rows >0)
    return true;
    return false;
}
function checkShipInDB($name)
{
    $num_rows = db_num_rows("SELECT * from `ships` where `name` = '{$name}'");
    if($num_rows >0)
    return true;
    return false;
}
function checkShareHolderOfShipInDB($nameShip, $nameUser )
{
    $num_rows = db_num_rows("SELECT * FROM `ships` as sh, `holdership` as ho, `users` as us WHERE sh.id = ho.idShip and ho.idHolder = us.id and  CONCAT(us.user_lname,' ',us.user_mname,' ',us.user_fname) = '{$nameUser}' and  sh.name = '{$nameShip}'");
    if($num_rows >0)
    return true;
    return false;
}
function getIdOfNameShip($name)
{
    $id = db_fetch_row("SELECT `id` FROM `ships` where `name` = '{$name}'");
    return $id;
}
function getIdOfNameCate($name)
{
    $id = db_fetch_row("SELECT `id` FROM `category` where `name` = '{$name}'");
    return $id;
}
function getIdOfNameAccount($name)
{
    $id = db_fetch_row("SELECT `id` FROM `account` where `name` = '{$name}'");
    return $id;
}
function getIdOfNameShareHolder($name)
{
    $id = db_fetch_row("SELECT `id` FROM `users` where concat(`user_lname`,' ',`user_mname`,' ',`user_fname`) = '{$name}'");
    return $id;
}
function getSpendOfNameCate($name)
{
    $id = db_fetch_row("SELECT `rev` FROM `category` where `name` = '{$name}'");
    return $id;
}
function formatDateToImport($date)
{
    $day = substr($date, 0,2);
    $month = substr($date, 3,2);
    $year =substr($date, 6,4);
    $date_new = $year."-".$month."-".$day;
    return $date_new;
}
// lấy ngày gần nhất đã nhập
function getMaxDate($date,$account)
{   
    $date1 = db_fetch_row("SELECT `date` FROM `ledgers` where `account` = '{$account}' order by `date` Desc LIMIT 1 ");
    $date1_new =$date1['date'];
    $day = substr($date, 0,2);
    $month = substr($date, 3,2);
    $year =substr($date, 6,4);
    $date_new = $year."-".$month."-".$day;
    if(strtotime($date1_new) < strtotime($date_new))
    {
        return true;
    }
    return false;
}
?>
