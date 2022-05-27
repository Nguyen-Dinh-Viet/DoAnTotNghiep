<?php 
    function construct()
    {
        load_model('index');
        // $list_users=get_list_users();
    }
    function listBankAction()
    {
        $data['banks']=get_info_banks();
        load_view("listBank",$data);
    }
    function addBankAction()
    {
        global $name_bank,$address,$des, $error;
        if(isset($_POST['btn-submit']))
        {
            
            $error=array();
            if(empty($_POST['name_bank']))
            {
                $error['name_bank'] = 'Bạn cần điền tên ngân hàng';
            }
            else {
                $name_bank =$_POST['name_bank'];
            }
            if(empty($_POST['address']))
            {
                $error['address'] = 'Bạn cần điền địa chỉ phòng giao dịch làm việc';
            }
            else {
                $address =$_POST['address'];
            }
            if(empty($_POST['des']))
            {
                $des="";
            }
            else {
                
                $des=$_POST['des'];
            }
            if(empty($error))
            {    
                   $data=array(
                       'name'=>$name_bank,
                       'address'=>$address,
                       'des' => $des    
                   );
                   db_insert('banks',$data);
                   echo "<script type='text/javascript' >alert('Thêm ngân hàng thành công!')</script>";
              
            }
            

        }
        load_view("addBank");

    }

    function changeBankAction()
    {
        $id=(int)$_GET['id'];
        $info_bank= get_info_bank_by_id($id);
        $data=array();
        $data['bank']=$info_bank;
        global $name_bank,$des,$address, $error;
       if(isset($_POST['btn-update']))
    {
        
        $error=array();
        if(empty($_POST['name_bank']))
        {
            $error['name_bank']="Bạn không được để trống trường này";

        }
        else {
            
            $name_bank=$_POST['name_bank'];
        }
        if(empty($_POST['address']))
            {
                $error['address'] = 'Bạn cần điền địa chỉ phòng giao dịch làm việc';
            }
            else {
                $address =$_POST['address'];
            }
        if(empty($_POST['des']))
        {
            $des="";

        }
        else {
            
            $des=$_POST['des'];
        }
        
        if(empty($error))
        {
            $data1=array(
                'name'=>$name_bank,
                'address' => $address,
                'des' => $des 
            );
            // show_array($data);
            $where="`id`={$id}";
            db_update('banks',$data1,$where);
            $info_bank= get_info_bank_by_id($id);
        
            $data['bank']=$info_bank;
            echo "<script type='text/javascript' >alert('Cập nhật ngân hàng thành công!')</script>";
            // sleep(2);

        //    redirect();
        }
        }    
       load_view('changeBank',$data);
    }
// xóa ngân hàng
    function deleteBankAction()
{
  
    load_view('deleteBank');

}
   

  
?>