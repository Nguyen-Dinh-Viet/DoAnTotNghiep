<?php
    $info = $_POST['data'];
    $sheetName = $_POST['sheet'];
   $error = false;
   if(getMaxDate($info[0]['Ngay'], getIdOfNameAccount($sheetName)['id']))
   {
    foreach($info as $item) {
      
        # code...
        if(checkAccountInDB($sheetName))
        {
            if (!isset($item['Loai_Thu_Chi'])  || !isset($item['So_Tien'])  || !isset($item['Ngay']))
            {
               $error =true;
            }
           
            elseif(checkCategoryInDB($item['Loai_Thu_Chi']))
            {
                if(!isset($item['Tau']))
                {
                        $add_ship = 0;
                }
                 elseif(checkShipInDB($item['Tau']))
                    {
                        $add_ship =getIdOfNameShip($item['Tau'])['id'];
                    }
                else{
                    $error =true;
                    }
                    
                    // // Lấy các thông tin tiếp theo
                     if(!isset($item['Co_Dong']) )
                    {  
                           $add_holder = 0;
                    }
                    else{
                        if(checkShareHolderOfShipInDB($item['Tau'],$item['Co_Dong']))
                        {
                           $add_holder =getIdOfNameShareHolder($item['Co_Dong'])['id'];
                        }
                        else{
                            $error =true;
                        }
                    }
                    // //
                    $add_cate = getIdOfNameCate($item['Loai_Thu_Chi'])['id'];
                     $add_spend = getSpendOfNameCate($item['Loai_Thu_Chi'])['rev'];
                    if(!isset($item['Mo_Ta']))
                    {
                        $add_des ="";
                    }
                    else {
                        $add_des =$item['Mo_Ta'];
                    }
                    $add_date= formatDateToImport($item['Ngay']);
                    $add_money =$item['So_Tien'];
                     $add_account = getIdOfNameAccount($sheetName)['id'];
                    $add_data = array(
                         'account' => $add_account,
                        'date' => $add_date,
                         'des' => $add_des,
                         'cat_id' => $add_cate,
                         'money' => $add_money,
                        'idShip' =>$add_ship,
                        'idHolder' => $add_holder,
                        'spend' => $add_spend,
                    );
                    db_insert('ledgers', $add_data);
                }
            else{
                $error =true;
            }
                
            }
        
        else{
            $error =true;
             }      
    }

   }
   else{
       $error=true;
   }
    
                $data = array(
                    'error' => $error,
                );
                echo json_encode($data);
?>
