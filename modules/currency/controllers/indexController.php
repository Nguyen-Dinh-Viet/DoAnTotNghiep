<?php 
    function construct()
    {
        load_model('index');
        // $list_users=get_list_users();
    }
    function listCurrencyAction()
    {
        $data['currencys']=get_info_currencys();
        load_view("listCurrency",$data);
    }
    function addCurrencyAction()
    {
        global $name_currency,$des, $error;
        if(isset($_POST['btn-submit']))
        {
            
            $error=array();
            if(empty($_POST['name_currency']))
            {
                $error['name_currency'] = 'Bạn cần điền tên tiền tệ';
            }
            else {
                $name_currency =$_POST['name_currency'];
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
                       'name'=>$name_currency,
                       'des' => $des    
                   );
                   db_insert('currency',$data);
                   echo "<script type='text/javascript' >alert('Thêm loại tiền thành công!')</script>";
              
            }
            

        }
        load_view("addCurrency");

    }

    function changeCurrencyAction()
    {
        $id=(int)$_GET['id'];
        $info_currency= get_info_currency_by_id($id);
        $data=array();
        $data['currency']=$info_currency;
        global $name,$des, $error;
       if(isset($_POST['btn-update']))
    {
        
        $error=array();
        if(empty($_POST['name']))
        {
            $error['name']="Bạn không được để trống trường này";

        }
        else {
            
            $name=$_POST['name'];
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
                'name'=>$name,
                'des' => $des 
            );
            // show_array($data);
            $where="`id`={$id}";
            db_update('currency',$data1,$where);
            $info_currency= get_info_currency_by_id($id);
            $data['currency']=$info_currency;
            echo "<script type='text/javascript' >alert('Cập nhật tiền tệ thành công!')</script>";
            // sleep(2);

        //    redirect();
        }
        }    
       load_view('changeCurrency',$data);
    }
// xóa tàu
    function deleteCurrencyAction()
{
  
    load_view('deleteCurrency');

}
   

  
?>