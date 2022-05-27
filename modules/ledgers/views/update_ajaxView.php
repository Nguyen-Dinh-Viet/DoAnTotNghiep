<?php 
    $id=(int)$_POST['id'];
    $info_ledger = get_info_ledger_by_id($id);
    $ship_id=$info_ledger['ship_id'];
    $result = "<option value='0'>--</option>";
     $shareholders = get_list_shareholder_by_id($ship_id);
    foreach ($shareholders as $item) {
        if($item['idHolder'] == $info_ledger['user_id'])
        {
            $result = $result ."<option selected='selected' value=".$item['idHolder'].">".$item['user_lname']." ".$item['user_mname']." ".$item['user_fname']."</option>";
        }
        else {
            $result = $result ."<option  value=".$item['idHolder'].">".$item['user_lname']." ".$item['user_mname']." ".$item['user_fname']."</option>";
        }
        
        # code...
    }
   $data =array(
       'info' => $info_ledger,
       'data' => $result
   );
   
    // $data=array(
    //     'nhap' => $key,
    //     'nhe' => '1'
    // );
     echo json_encode($data) ;

?>