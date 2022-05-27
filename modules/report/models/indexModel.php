<?php
// lay thông tin user
function get_info_user_by_email($email)
{
    $info=db_fetch_row("SELECT * FROM `users` WHERE `user_email` = '{$email}' ");
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
//////////////////////////// Báo cáo chung ////////////////////
// lấy danh sách theo yêu cầu
function get_list_info_general($id_cate,$id_ship,$from,$to)
{
    $info = db_fetch_array("SELECT le.id,le.date,le.des,ac.name, if(ac.currency ='1',le.money,0) as 'tien_vnd', if(ac.currency ='2',le.money,0) as 'tien_usd',ac.currency from `ledgers` as le LEFT JOIN `account` as ac on le.account = ac.id WHERE le.cat_id='{$id_cate}' and le.idShip='{$id_ship}' and le.date between '{$from}' and '{$to}' order by le.date DESC");
    return $info;
}
// lấy danh sách tiền chi cho cổ đông
function get_list_shareholder($from, $to)
{
    $data = array();
    $shareholders = db_fetch_array("SELECT us.id , us.user_fname, us.user_mname, us.user_lname, sum(if(cu.id = 1, le.money,0)) as 'tong_tien_vnd',sum(if(cu.id = 2, le.money,0)) as 'tong_tien_USD' from `ledgers` as le, `account` as ac, `users` as us, `currency` as cu WHERE le.account = ac.id and le.idHolder = us.id and ac.currency = cu.id and le.spend ='1' and le.date between '{$from}' and '{$to}' group BY us.id");
    foreach ($shareholders as $item) {
        # code...
        $data["{$item['id']}"] = $item;
        $temp_ship =db_fetch_array("SELECT sh.name FROM `holdership` as ho, `ships` as sh WHERE ho.idHolder = '{$item['id']}' and sh.id = ho.idShip");
        $data["{$item['id']}"]["ship"]= $temp_ship;
    }

    return $data;
}
// danh sách chi tiết tiền trả cho cổ đông
function get_watch_detail($id,$from,$to)
{
    $data = db_fetch_array("SELECT us.user_lname, us.user_fname, us.user_mname, le.money, ca.name as cate_name, ac.name as account_name,le.date,le.des, cu.name as currency_name FROM `users` as us, `currency` as cu, `category` as ca, `ledgers` as le LEFT JOIN `account` as ac on le.account = ac.id WHERE us.id = le.idHolder and us.id= '{$id}' and cu.id = ac.currency and le.cat_id = ca.id and le.spend = '1' and le.date between '{$from}' and '{$to}' order by le.date DESC");
    return $data;
}

////// Báo cáo doanh thu từng tàu
function get_list_revenue_ships_VND($from, $to)
{
    $data = db_fetch_array("SELECT sh.id, sh.name, sum(IF(le.spend =0, le.money,0)) as 'Tong_thu_vnd', sum(if(le.spend =1,le.money,0)) as 'Tong_chi_vnd',ac.currency from `ships` as sh LEFT JOIN `ledgers` as le on sh.id = le.idShip , `account` ac WHERE ac.currency='1' and ac.id = le.account and le.date between '{$from}' and '{$to}' GROUP by sh.id");
    return $data;
}
function get_list_revenue_ships_USD($from, $to)
{
    $data = db_fetch_array("SELECT sh.id, sh.name, sum(IF(le.spend =0, le.money,0)) as 'Tong_thu_usd', sum(if(le.spend =1,le.money,0)) as 'Tong_chi_usd',ac.currency from `ships` as sh LEFT JOIN `ledgers` as le on sh.id = le.idShip , `account` ac WHERE ac.currency='2' and ac.id = le.account and le.date between '{$from}' and '{$to}' GROUP by sh.id");
    return $data;
}
//laays chi tiết danh sách thu chi của 1 tàu
function get_list_ledger_by_ship_id($id,$currency, $from,$to)
{
    $data = db_fetch_array("SELECT le.id,le.spend, le.date, ca.name as cate_name , le.money, us.user_fname,us.user_mname,us.user_lname, ac.name, le.des from `ledgers` as le left join `account` as ac on le.account = ac.id left JOIN `users` as us on le.idHolder = us.id left JOIN `category` as ca on ca.id = le.cat_id WHERE ac.currency ='{$currency}' and le.date between '{$from}' and '{$to}' and le.idShip ='{$id}'  order by le.date desc");
    return $data;
}

////// Báo cáo chi dầu của từng tàu
function get_list_oil_ships_VND($from,$to)
{
    $data =db_fetch_array("SELECT sh.id, sh.name, sum(le.money) as 'Tong_tien_vnd',ac.currency FROM `ships` as sh left JOIN  `ledgers` as le on sh.id = le.idShip left JOIN `account` as ac on le.account = ac.id WHERE le.cat_id = '7' and ac.currency = '1' and le.date between '{$from}' and '{$to}' GROUP by sh.id");
    return $data;
}
function get_list_oil_ships_USD($from,$to)
{
    $data =db_fetch_array("SELECT sh.id, sh.name, sum(le.money) as 'Tong_tien_usd',ac.currency FROM `ships` as sh left JOIN  `ledgers` as le on sh.id = le.idShip left JOIN `account` as ac on le.account = ac.id WHERE le.cat_id = '7' and ac.currency = '2' and le.date between '{$from}' and '{$to}' GROUP by sh.id");
    return $data;
}
//laays chi tiết danh sách thu chi của 1 tàu
function get_list_oil_by_ship_id($id,$currency, $from,$to)
{
    $data = db_fetch_array("SELECT le.date, le.money, le.des, ac.name as acc_name, sh.name FROM `ships` as sh left JOIN `ledgers` as le on sh.id = le.idShip left JOIN `account` as ac on le.account = ac.id WHERE le.cat_id = '7' and ac.currency = '1' and le.idShip ='{$id}' and ac.currency ='{$currency}' and le.date between '{$from}' and '{$to}' order by le.date desc");
    return $data;
}

////// Báo cáo tiền lương của từng cổ đông
function get_list_salary_holders_VND($from,$to)
{
    $data =db_fetch_array("SELECT us.id , us.user_fname, us.user_mname,us.user_lname, sum(le.money) as 'Tong_luong_vnd', ac.currency FROM `users` as us left JOIN `ledgers` as le on us.id = le.idHolder left JOIN `account` as ac on le.account = ac.id WHERE le.cat_id = '2' and ac.currency = '1' and us.user_role_id = '2' and le.date between '{$from}' and '{$to}' GROUP by us.id");
    return $data;
}
function get_list_salary_holders_USD($from,$to)
{
    $data =db_fetch_array("SELECT us.id , us.user_fname, us.user_mname,us.user_lname, sum(le.money) as 'Tong_luong_usd', ac.currency FROM `users` as us left JOIN `ledgers` as le on us.id = le.idHolder left JOIN `account` as ac on le.account = ac.id WHERE le.cat_id = '2' and ac.currency = '2' and us.user_role_id = '2' and le.date between '{$from}' and '{$to}' GROUP by us.id");
    return $data;
}
//laays chi tiết danh sách thu chi của 1 cổ đông
function get_list_salary_by_holder_id($id,$currency, $from,$to)
{
    $data = db_fetch_array("SELECT le.id, le.date,le.money,le.des,ac.name as acc_name,us.user_fname,us.user_mname,us.user_lname, sh.name as ship_name  from `users` as us LEFT JOIN `ledgers` as le on us.id = le.idHolder left  JOIN `account` as ac on le.account = ac.id left join `ships` as sh on le.idShip = sh.id WHERE le.cat_id ='2' and ac.currency ='{$currency}' and le.date between '{$from}' and '{$to}' and us.id ='{$id}' order by le.date desc");
    return $data;
}

////// Báo cáo chi lãi của từng cổ đông
function get_list_interest_holders_VND($from,$to)
{
    $data =db_fetch_array("SELECT us.id,us.user_fname, us.user_mname,us.user_lname, sum(le.money) as 'Tong_chi_lai_vnd',ac.currency FROM `users` as us left JOIN  `ledgers` as le on us.id = le.idHolder left JOIN `account` as ac on le.account = ac.id WHERE le.cat_id = '10' and ac.currency = '1' GROUP by us.id");
    return $data;
}
function get_list_interest_holders_USD($from,$to)
{
    $data =db_fetch_array("SELECT us.id,us.user_fname, us.user_mname,us.user_lname, sum(le.money) as 'Tong_chi_lai_usd',ac.currency FROM `users` as us left JOIN  `ledgers` as le on us.id = le.idHolder left JOIN `account` as ac on le.account = ac.id WHERE le.cat_id = '10' and ac.currency = '2' GROUP by us.id");
    return $data;
}
//laays chi tiết danh sách thu chi của 1 cổ đông
function get_list_interest_by_holder_id($id,$currency, $from,$to)
{
    $data = db_fetch_array("SELECT le.id, le.date,le.money,le.des,ac.name as acc_name,us.user_fname,us.user_mname,us.user_lname, sh.name as ship_name  from `users` as us LEFT JOIN `ledgers` as le on us.id = le.idHolder left  JOIN `account` as ac on le.account = ac.id left join `ships` as sh on le.idShip = sh.id WHERE le.cat_id ='10' and ac.currency ='{$currency}' and le.date between '{$from}' and '{$to}' and us.id ='{$id}' order by le.date desc");
    return $data;
}


////// Báo cáo doanh thu từng tàu khi là cổ đông
function get_list_revenue_ships_of_holder_VND($id,$from, $to)
{
    $data = db_fetch_array("SELECT sh.id, sh.name, sum(IF(le.spend =0, le.money,0)) as 'Tong_thu_vnd', sum(if(le.spend =1,le.money,0)) as 'Tong_chi_vnd',ac.currency from `ships` as sh LEFT JOIN `ledgers` as le on sh.id = le.idShip , `account` ac, `holdership`  ho WHERE ho.idShip = sh.id and ho.idHolder = '{$id}' and ac.currency='1' and ac.id = le.account and le.date between '{$from}' and '{$to}' GROUP by sh.id");
    return $data;
}
function get_list_revenue_ships_of_holder_USD($id,$from, $to)
{
    $data = db_fetch_array("SELECT sh.id, sh.name, sum(IF(le.spend =0, le.money,0)) as 'Tong_thu_usd', sum(if(le.spend =1,le.money,0)) as 'Tong_chi_usd',ac.currency from `ships` as sh LEFT JOIN `ledgers` as le on sh.id = le.idShip , `account` ac, `holdership`  ho WHERE ho.idShip = sh.id and ho.idHolder = '{$id}' and ac.currency='2' and ac.id = le.account and le.date between '{$from}' and '{$to}' GROUP by sh.id");
    return $data;
}


