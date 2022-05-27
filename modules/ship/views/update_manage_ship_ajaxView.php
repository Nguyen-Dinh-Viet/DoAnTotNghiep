<?php 
    $id =$_POST['id'];
    $date = $_POST['date'];
    $from_port =$_POST['from_port'];
    $to_port = $_POST['to_port'];
    $ship_id =$_POST['ship_id'];
    $transport_company = $_POST['transport_company'];
    $goods =$_POST['goods'];
    $quantity = $_POST['quantity'];
    $price =$_POST['price'];
    $money = $_POST['money'];
    $note = $_POST['note'];
    $currency_id =$_POST['currency_id'];
    if($price ==!"")
    {
      $money =$price * $quantity;
    }
   $data1= array(
    'idShip' => $ship_id,
    'date' => $date,
    'fromPort' => $from_port,
     'toPort' => $to_port,
     'transportCompany' => $transport_company,
     'goods' => $goods,
     'quantity' => $quantity,
     'price' => $price,
     'money' => $money,
     'note' => $note,
     'currency_id' =>$currency_id,
   );
   $where = "`id`={$id} ";
 db_update('transport', $data1, $where);

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