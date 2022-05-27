<?php 

    $id =$_POST['id'];
    $date = $_POST['date'];
    
 $cat_id = $_POST['cat_id'];
  $spend = get_id_spend_of_cat($cat_id);
   $money = $_POST['money'];
   $des = $_POST['des'];
   $ship_id =$_POST['ship_id'];
   $shareholder_id=$_POST['shareholder_id'];
   $data1= array(
    'date' => $date,
    'des' => $des,
    'cat_id' => $cat_id,
     'money' => $money,
     'spend' => $spend[0]['rev'],
    'idShip' => $ship_id,
    'idHolder'=>$shareholder_id,
   );
   $where = "`id`={$id}";
 db_update('ledgers', $data1, $where); 
//     $status = true;
//    $data=$status;

    // $data=array(
    //     'nhap' => $key,
    //     'nhe' => '1'
    // );
    $data = array(
        'status' => true,
    );
 die (json_encode($data)) ;

?>