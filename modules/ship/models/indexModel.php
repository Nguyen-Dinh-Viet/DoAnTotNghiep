<?php 
function get_info_ships()
{

    $ships = db_fetch_array("SELECT * FROM `ships`");
    foreach ($ships as &$item) 
    {
        $item['changeShip']="?mod=ship&action=changeShip&id={$item['id']}";
        $item['deleteShip']="?mod=ship&action=deleteShip&id={$item['id']}";
        $temp = db_fetch_array("SELECT * FROM `holdership` LEFT JOIN `users` ON `users`.`id`=`holdership`.`idHolder` where `idShip` = '{$item['id']}' ");
        $item['shareholders'] = $temp;
    }
    
    return $ships;
}

// Lấy danh sách tàu
function get_list_ship()
{

    $info = db_fetch_array("SELECT * FROM `ships`");
   
    return $info;
}
// xoa tau
function delete_ship($id)
    {
    $query="DELETE from `ships` where `id`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá tàu thành công!')</script>";
    }
    // lay thông tin ship
 function get_info_ship_by_id($id)
    {
        $info=db_fetch_row("SELECT * FROM `ships` WHERE `id` = '{$id}' ");
        return $info;
    }
// lấy danh sách cổ đông
function get_list_shareholder()
{
    $list = db_fetch_array("SELECT * FROM `users` WHERE `user_role_id` = '2'");
    return $list;
}
// Lấy danh sách cổ đông của 1 tàu
function get_list_shareholder_by_id($id)
{
    $list = db_fetch_array("SELECT * FROM `holdership` as ho, `users` as us WHERE us.`id` = ho.`idHolder` and  `idShip` = '{$id}' ");
    return $list;
}
// lấy thông tin chi tiết của 1 tàu
function get_info_shareholder_by_id($idShip, $idHolder)
{
    $info = db_fetch_row("SELECT * FROM `holdership` as ho LEFT JOIN `users` as us on ho.idHolder = us.id LEFT JOIN `ships` as sh on sh.id = ho.idShip WHERE ho.idShip = '{$idShip}' and ho.idHolder ='{$idHolder}' ");
    return $info;
}
// xóa cổ đông của tàu
function delete_shareholder($id_ship,$id_holder){
    $query ="DELETE FROM `holdership` where `idShip`='{$id_ship}' and `idHolder` = '{$id_holder}'";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá cổ đông thành công!')</script>";
}

// lấy danh sách vận chuyển
function get_list_transport()
{
    $list = db_fetch_array("SELECT tr.id as id,tr.date as date,tr.idShip as idShip,tr.fromPort as fromPort,tr.toPort as toPort, tr.transportCompany as transportCompany, tr.goods as goods, tr.quantity as quantity,cu.id as currency_id, cu.name as currency_name, tr.price as price, tr.money as money, tr.note as note, sh.name as name FROM `transport` as tr  LEFT JOIN `ships` as sh on tr.idShip = sh.id LEFT JOIN `currency` as cu on tr.currency_id = cu.id ORDER BY tr.date desc");
    return $list;
}
// lấy vận chuyển 1 id
function get_info_transport_by_id($id)
{
    $info = db_fetch_row("SELECT * from `transport` where `id`= '{$id}'  ");
    return $info;
}
// xoá vận chuyển
function delete_manage_ship($id)
    {
    $query="DELETE from `transport` where `id`={$id}";
    db_query($query);
    echo "<script type='text/javascript' >alert('Xoá chuyến tàu thành công!')</script>";
    }

    // Lấy danh sách tiền tệ
function get_list_currency()
{

    $info = db_fetch_array("SELECT * FROM `currency`");
   
    return $info;
}
?>

