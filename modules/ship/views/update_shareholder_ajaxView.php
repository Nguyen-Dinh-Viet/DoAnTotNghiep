<?php 
    $idShip =$_POST['idShip'];
    $ratio = $_POST['ratio'];
    
 $info = $_POST['info'];
   $idHolder=$_POST['idHolder'];
   $data1= array(
    'idShip' => $idShip,
    'idHolder' => $idHolder,
    'ratio' => $ratio,
     'info' => $info,
   );
   $where = "`idShip`={$idShip} and `idHolder` ={$idHolder}";
 db_update('holdership', $data1, $where);

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