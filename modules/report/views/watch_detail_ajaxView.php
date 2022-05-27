<?php 
 $id =$_POST['id'];
 $from = $_POST['from'];
 $to =$_POST['to'];
 $data = get_watch_detail($id,$from,$to);

//     $status = true;
//    $data=$status;

 // $data=array(
 //     'nhap' => $key,
 //     'nhe' => '1'
 // );

die (json_encode($data)) ;
?>