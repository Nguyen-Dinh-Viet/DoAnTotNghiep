<?php 
 $id =$_POST['id'];
 $curr =$_POST['curr'];
 $from = $_POST['from'];
 $to =$_POST['to'];
 $data = get_list_oil_by_ship_id($id,$curr,$from,$to);

//     $status = true;
//    $data=$status;

 // $data=array(
 //     'nhap' => $key,
 //     'nhe' => '1'
 // );

die (json_encode($data)) ;
?>