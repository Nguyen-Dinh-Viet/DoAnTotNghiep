<?php 
    $id_ship=(int)$_POST['val_ship_id'];
    $shareholders = get_list_shareholder_by_id($id_ship);
    $result = "<option value='0'>--</option>";
    foreach ($shareholders as $item) {
        $result = $result ."<option value=".$item['idHolder'].">".$item['user_lname']." ".$item['user_mname']." ".$item['user_fname']."</option>";
        # code...
    }
   $data= array(
       'data' =>$result
   );
// $data = array(
//     'status' => true,
// );
die (json_encode($data)) ;

?>