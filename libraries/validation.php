<?php 
    function is_username($username){
        $partten="/^[A-Za-z0-9_\.]{6,32}$/";
            if(!preg_match($partten, $username, $matchs))
           return false;
           return true;
    }
    function is_password($password)
    {
        $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
            if(!preg_match($partten, $password, $matchs))
                return false;
            return true;
    }
    // function is_fullname($fullname)
    // {
    //     $partten="/^[A-Za-z ]{6,32}$/";
    //         if(!preg_match($partten, $fullname, $matchs))
    //        return false;
    //        return true;
    // }
    function is_email($email)
    {
        $partten="/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
            if(!preg_match($partten, $email, $matchs))
           return false;
           return true;
    }
    function is_phone($phone)
    {
        $partten="/^[0-9]{10,11}$/";
        if(!preg_match($partten, $phone, $matchs))
           return false;
           return true;
    }
      //xuất lỗi cho form
      function form_error($label_field)
      {
          global $error;
          if(!empty($error[$label_field]))
          return "<p class='error'>{$error[$label_field]}</p>";
  
      }
      //xuất giá trị cho field
      function set_value($label_field)
      {
          global $$label_field;
          if(!empty($$label_field))
          return $$label_field;
      }
   
?>