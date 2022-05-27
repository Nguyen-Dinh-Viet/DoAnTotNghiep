<?php 
    function construct()
    {
        load_model('index');
        // $list_users=get_list_users();
    }
    function listCategoryAction()
    {
        $data['categorys']=get_info_categorys();
        load_view("listCategory",$data);
    }
    function addCategoryAction()
    {
        global $name_category,$rev,$des, $error;
        if(isset($_POST['btn-submit']))
        {
            
            $error=array();
            if(empty($_POST['name_category']))
            {
                $error['name_category'] = 'Bạn cần điền tên loại thu chi';
            }
            else {
                $name_category =$_POST['name_category'];
            }
            if(empty($_POST['rev']))
            {
                $rev ='0';
            }
            else {
                $rev =$_POST['rev'];
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
                       'name'=>$name_category,
                       'rev'=>$rev,
                       'des' => $des    
                   );
                   db_insert('category',$data);
                   echo "<script type='text/javascript' >alert('Thêm danh mục thành công!')</script>";
              
            }
            

        }
        load_view("addCategory");

    }

    function changeCategoryAction()
    {
        $id=(int)$_GET['id'];
        $info_category= get_info_category_by_id($id);
        $data=array();
        $data['category']=$info_category;
        global $name,$des,$rev, $error;
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
        $rev =$_POST['rev'];
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
                'rev' => $rev,
                'des' => $des 
            );
            // show_array($data);
            $where="`id`={$id}";
            db_update('category',$data1,$where);
            $info_category= get_info_category_by_id($id);
       
            $data['category']=$info_category;
             echo "<script type='text/javascript' >alert('Cập nhật danh mục thành công!')</script>";
            // sleep(2);

        //    redirect();
        }
        }    
       load_view('changeCategory',$data);
    }
// xóa ngân hàng
    function deleteCategoryAction()
{
  
    load_view('deleteCategory');

}
   

  
?>