<?php 
   $idShip= (int)$_POST['idShip'];
    $idHolder=(int)$_POST['idHolder'];
    $info_shareholder = get_info_shareholder_by_id($idShip, $idHolder);
   $data=$info_shareholder;
    
     echo json_encode($data) ;

?>