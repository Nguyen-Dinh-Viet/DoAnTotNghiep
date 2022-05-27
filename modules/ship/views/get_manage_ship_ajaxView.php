<?php 
   $id= (int)$_POST['id'];
    $info_transport = get_info_transport_by_id($id);
   $data=$info_transport;
    
     echo json_encode($data) ;

?>