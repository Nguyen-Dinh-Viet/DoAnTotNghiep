<?php
function construct()
{
    load_model('index');
    // $list_users=get_list_users();
}
function listUserAction()
{
    $data['users'] = get_info_users();
    load_view("listUser", $data);
}
function addUserAction()
{
    global $lastname, $middlename, $firstname, $email, $password, $phone, $role, $activate, $gender, $tax_code, $address, $error;
    if (isset($_POST['btn-submit'])) {

        $error = array();
        if (empty($_POST['activate'])) {
            $activate = '0';
        } else {
            $activate = '1';
        }
        if (empty($_POST['gender'])) {
            $gender = 'Nam';
        } else {
            $gender = $_POST['gender'];
        }
        if (empty($_POST['role'])) {
            $role = '1';
        } else {
            $role = $_POST['role'];
        }
        if (empty($_POST['firstname'])) {
            $error['firstname'] = "Bạn cần điền tên";
        } else {
            $firstname = $_POST['firstname'];
        }
        if (empty($_POST['middlename'])) {
            $error['middlename'] = "Bạn cần điền họ đệm";
        } else {
            $middlename = $_POST['middlename'];
        }
        if (empty($_POST['lastname'])) {
            $error['lastname'] = "Bạn cần điền họ";
        } else {
            $lastname = $_POST['lastname'];
        }
        if (empty($_POST['password'])) {
            $error['password'] = "Bạn không được để trống mật khẩu!";
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "Mật khẩu từ 6 tới 32 kí tự";
            } else {
                // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
                if (!is_password($_POST['password'])) {
                    $error['password'] = "Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
                } else $password = md5($_POST['password']);
                // md5($_POST['password']);

            }
        }
        if (empty($_POST['email'])) {
            $error['email'] = "Bạn không được để trống trường email!";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng!";
            } else {
                $email = $_POST['email'];
            }
        }

        if (empty($_POST['phone'])) {
            $error['phone'] = "Bạn không được để trống trường số điện thoại!";
        } else {
            if (!is_phone($_POST['phone'])) {
                $error['phone'] = "Số điện thoại không đúng định dạng!";
            } else {
                $phone = $_POST['phone'];
            }
        }
        if ($_POST['role'] == "2") {
            if (empty($_POST['tax_code'])) {
                $error['tax_code'] = "Bạn không được để trống mã số thuế!";
            } else {
                $tax_code = $_POST['tax_code'];
            }
            if (empty($_POST['address'])) {
                $error['address'] = "Bạn không được để trống địa chỉ nơi ở!";
            } else {
                $address = $_POST['address'];
            }
        } else {
            # code...
            $tax_code = "";
            $address = "";
        }
        if (empty($error)) {
            if (check_mail($email) || check_phone($phone))
                $error['account'] = "Tên đăng nhập, email, tên hiển thị hoặc số điện thoại đã tồn tại";
            else {

                $data = array(
                    'user_fname' => $firstname,
                    'user_mname' => $middlename,
                    'user_lname' => $lastname,
                    'user_email' => $email,
                    'user_contact' => $phone,
                    'user_role_id' => $role,
                    'activate' => $activate,
                    'user_password' => $password,
                    'gender' => $gender,
                    'taxcode' => $tax_code,
                    'addr' => $address
                );
                db_insert('users', $data);
                echo "<script type='text/javascript' >alert('Thêm tài khoản thành công!')</script>";
            }
        }
    }
    load_view("addUser");
}

function changeUserAction()
{
    $id = (int)$_GET['id'];
    $info_user = get_info_user_by_id($id);
    $data = array();
    $data['user'] = $info_user;
    global $lastname, $middlename, $firstname, $phone, $role, $activate, $gender, $tax_code, $address, $error;
    if (isset($_POST['btn-update-user'])) {

        $error = array();
        if (empty($_POST['lastname'])) {
            $error['lastname'] = "Bạn không được để trống trường này";
        } else {

            $lastname = $_POST['lastname'];
        }
        if (empty($_POST['middlename'])) {
            $error['middlename'] = "Bạn không được để trống trường này";
        } else {

            $middlename = $_POST['middlename'];
        }
        if (empty($_POST['firstname'])) {
            $error['firstname'] = "Bạn không được để trống trường này";
        } else {

            $firstname = $_POST['firstname'];
        }
        if (empty($_POST['phone'])) {
            $error['phone'] = "Bạn không được để trống trường số điện thoại!";
        } else {
            if (!is_phone($_POST['phone'])) {
                $error['phone'] = "Số điện thoại không đúng định dạng!";
            } else {
                $phone = $_POST['phone'];
            }
        }
        if (empty($_POST['activate'])) {
            $activate = '0';
        } else {
            $activate = $_POST['activate'];
        }
        if (empty($_POST['gender'])) {
            $gender = 'Nam';
        } else {
            $gender = $_POST['gender'];
        }
        if (empty($_POST['role'])) {
            $role = '1';
        } else {
            $role = $_POST['role'];
        }
        if ($_POST['role'] == "2") {
            if (empty($_POST['tax_code'])) {
                $error['tax_code'] = "Bạn không được để trống mã số thuế!";
            } else {
                $tax_code = $_POST['tax_code'];
            }
            if (empty($_POST['address'])) {
                $error['address'] = "Bạn không được để trống địa chỉ nơi ở!";
            } else {
                $address = $_POST['address'];
            }
        } else {
            # code...
            $tax_code = "";
            $address = "";
        }
        if (empty($error)) {
            $data1 = array(
                'user_fname' => $firstname,
                'user_mname' => $middlename,
                'user_lname' => $lastname,
                'user_contact' => $phone,
                'user_role_id' => $role,
                'activate' => $activate,
                'gender' => $gender,
                'taxcode' => $tax_code,
                'addr' => $address
            );
            // show_array($data);
            $where = "`id`={$id}";
            db_update('users', $data1, $where);
            $info_user = get_info_user_by_id($id);
            $data['user'] = $info_user;
            echo "<script type='text/javascript' >alert('Cập nhật tài khoản thành công!')</script>";
            // sleep(2);

            //    redirect();
        }
    }
    load_view('changeUser', $data);
}
// xóa người dùng
function deleteUserAction()
{

    load_view('deleteUser');
}
// đổi mật khẩu
function changePasswordAction()
{
    global $old_password, $new_password, $confirm_password, $error;
    if (isset($_POST['btn-update-pass'])) {
    if (isset($_COOKIE['username'])) {
        $email = $_COOKIE['username'];
    } else {
        $email = $_SESSION['user_login'];
    }
    $info_user = get_info_user_by_email($email);
    if (empty($_POST['old_password'])) {
        $error['old_password'] = "Bạn không được để trống mật khẩu!";
    } else {
        if (!(strlen($_POST['old_password']) >= 6 && strlen($_POST['old_password']) <= 32)) {
            $error['old_password'] = "Mật khẩu từ 6 tới 32 kí tự";
        } else {
            // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
            if (!is_password($_POST['old_password'])) {
                $error['old_password'] = "Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
            } else 
            {
                $old_password = md5($_POST['old_password']);
            // md5($_POST['password']);
                if(!check_password($old_password,$email))
                {
                    $error['old_password'] = "Mật khẩu cũ không chính xác!";
                }
                
            }
            

        }
    }
    if (empty($_POST['new_password'])) {
        $error['new_password'] = "Bạn không được để trống mật khẩu mới!";
    } else {
        if (!(strlen($_POST['new_password']) >= 6 && strlen($_POST['new_password']) <= 32)) {
            $error['new_password'] = "Mật khẩu từ 6 tới 32 kí tự";
        } else {
            // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
            if (!is_password($_POST['new_password'])) {
                $error['new_password'] = "Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
            } else $new_password = md5($_POST['new_password']);
            // md5($_POST['password']);

        }
    }
    if (empty($_POST['confirm_password'])) {
        $error['confirm_password'] = "Bạn không được để trống mật khẩu xác nhận!";
    } else {
        if (!(strlen($_POST['confirm_password']) >= 6 && strlen($_POST['confirm_password']) <= 32)) {
            $error['confirm_password'] = "Mật khẩu từ 6 tới 32 kí tự";
        } else {
            // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
            if (!is_password($_POST['confirm_password'])) {
                $error['confirm_password'] = "Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
            } else $confirm_password = md5($_POST['confirm_password']);
            // md5($_POST['password']);

        }
    }
    if($_POST['new_password'] != $_POST['confirm_password'])
    {
        $error['password'] = "Mật khảu mới và mật khẩu xác nhận không giống nhau!";
    }
    if(empty($error))
    {
        $data1 = array(
            'user_password' => $new_password,
        );
        $where = "`user_email`='{$email}'";
        db_update('users', $data1, $where);
            echo "<script type='text/javascript' >alert('Cập nhật mật khẩu thành công!')</script>";
    }
}
    load_view('changePassword');
}

// function regAction()
// {
// global $fullname, $username,$password,$error,$email;
// if(isset($_POST['btn_reg']))
// {
//     $error=array();
//     if(empty($_POST['fullname']))
//     {
//         $error['fullname']="Bạn cần điền họ và tên";
//     }
//     else $fullname=$_POST['fullname'];
//     if(empty($_POST['username']))
//     {
//         $error['username']="Bạn cần điền tên đăng nhập";

//     }
//     else{

//         if(!(strlen($_POST['username'])>=6 && strlen($_POST['username'])<=32))
//         {
//             $error['username']="Tên đăng nhập từ 6 tới 32 kí tự";
//         }   
//         else {
//             if(!is_username($_POST['username']))
//             {
//                 $error['username'] ="Tên đăng nhập cho phép nhập kí tự A->Z a->z 0->9 _ ";
//             }
//             else $username=$_POST['username'];



//         }

//     }
//     if(empty($_POST['password']))
//     {
//         $error['password']="Bạn cần điền mật khẩu";

//     }
//     else{

//         if(!(strlen($_POST['password'])>=6 && strlen($_POST['password'])<=32))
//         {
//             $error['password']="Mật khẩu từ 6 tới 32 kí tự";
//         }   
//         else {
//             if(!is_password($_POST['password']))
//             {
//                 $error['password'] ="Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
//             }
//         else $password=$_POST['password'];

//         }

//     }
//     if(empty($_POST['email']))
//     {
//         $error['email']="Bạn cần điền email";

//     }
//     else{

//         if(!is_email($_POST['email']))
//          {
//        $error['email'] ="Email không đúng định dạng ";
//          }
//          else $email=$_POST['email'];
//     }

//     if(empty($error))
//     {
//         $active_token=md5($username.time());
//     $data['username']=$username;
//     $data['password']=$password;
//     $data['fullname']=$fullname;
//     $data['email']=$email;
//     $data['active_token']=$active_token;
//     $data['reg_time']=time();
//     db_insert('tbl_users',$data);
//     $link_active=base_url("?mod=user&action=active&active_token={$active_token}");
//     $content="<p>Chào bạn {$fullname}</p>
//     <p>Bạn vui lòng click vào đường link này để kích hoạt tài khoản:{$link_active}</p>
//     <p>Nếu không phải bạn đăng ký tài khoản thì hãy bỏ qua email này</p>
//     <p>I'm Black Hole</p>";
//     echo send_mail('boykutehyvn1999@gmail.com','Đỗ Văn Hoàng','Kích hoạt tài khoản',$content);

//     }

// }
//     load_view('reg');
// }
function loginAction()
{

    global $email, $password, $error;
    if (isset($_POST['btn_login'])) {
        $error = array();
        if (empty($_POST['email'])) {
            $error['email'] = "Bạn cần điền email";
        } else {

            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng ";
            } else $email = $_POST['email'];
        }
        if (empty($_POST['password'])) {
            $error['password'] = "Bạn cần điền mật khẩu";
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "Mật khẩu từ 6 tới 32 kí tự";
            } else {
                // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
                if (!is_password($_POST['password'])) {
                    $error['password'] = "Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
                } else $password = md5($_POST['password']);
            }
        }

        if (empty($error)) {
            if (check_login($email, $password)) {
                if (!empty($_POST['remember_me']) && $_POST['remember_me'] == 1) {
                    setcookie('is_login', true, time() + 3600);
                    setcookie('user_name', $email, time() + 3600);
                }
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $email;

                // chuyển hướng vào hệ thống
                redirect();
            } else {
                $error['account'] = "Tên tài khoản hoặc mật khẩu không tồn tại";
            }
        }
    }
    load_view('login');
}
// function activeAction()
// {
//     // $active_token=$_GET['active_token'];
//     // $link_login=base_url("?mod=user&action=login");
//     // if(check_active_token($active_token))
//     // {
//     //     echo active_user($active_token);

//     //     echo "Bạn đã kích hoạt thành công! Vui lòng kích hoạt vào link sau để đăng nhập! <a href='$link_login'>Đăng nhập</a>";
//     // }
//     // else{
//     //     echo "Yêu cầu kích hoạt không hợp lệ! Vui lòng kích hoạt vào link sau để đăng nhập! <a href='$link_login'>Đăng nhập</a>";
//     // }

// }

function logoutAction()
{
    global $email;
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    setcookie('is_login', true, time() - 3600);
    setcookie('user_name', $email, time() - 3600);
    // unset($_SESSION['password']);
    redirect("?mod=user&controller=index&action=login");
    //   redirect("?mod=user&action=login");
    // load_view('login');
}

function infoUserAction()
{
    if (isset($_COOKIE['username'])) {
        $email = $_COOKIE['username'];
    } else {
        $email = $_SESSION['user_login'];
    }
    $info_user = get_info_user_by_email($email);
    $data = array();
    $data['user'] = $info_user;
    global $lastname, $middlename, $firstname, $phone, $role, $activate, $gender, $tax_code, $address, $error;
    if (isset($_POST['btn-update-user'])) {

        $error = array();
        if (empty($_POST['lastname'])) {
            $error['lastname'] = "Bạn không được để trống trường này";
        } else {

            $lastname = $_POST['lastname'];
        }
        if (empty($_POST['middlename'])) {
            $error['middlename'] = "Bạn không được để trống trường này";
        } else {

            $middlename = $_POST['middlename'];
        }
        if (empty($_POST['firstname'])) {
            $error['firstname'] = "Bạn không được để trống trường này";
        } else {

            $firstname = $_POST['firstname'];
        }
        if (empty($_POST['phone'])) {
            $error['phone'] = "Bạn không được để trống trường số điện thoại!";
        } else {
            if (!is_phone($_POST['phone'])) {
                $error['phone'] = "Số điện thoại không đúng định dạng!";
            } else {
                $phone = $_POST['phone'];
            }
        }

        if (empty($_POST['gender'])) {
            $gender = 'Nam';
        } else {
            $gender = $_POST['gender'];
        }

        if ($info_user['user_role_id'] == "2") {
            if (empty($_POST['tax_code'])) {
                $error['tax_code'] = "Bạn không được để trống mã số thuế!";
            } else {
                $tax_code = $_POST['tax_code'];
            }
            if (empty($_POST['address'])) {
                $error['address'] = "Bạn không được để trống địa chỉ nơi ở!";
            } else {
                $address = $_POST['address'];
            }
        } else {
            # code...
            $tax_code = "";
            $address = "";
        }
        if (empty($error)) {
            $data1 = array(
                'user_fname' => $firstname,
                'user_mname' => $middlename,
                'user_lname' => $lastname,
                'user_contact' => $phone,
                'gender' => $gender,
                'taxcode' => $tax_code,
                'addr' => $address
            );
            // show_array($data);
            $where = "`user_email`='{$email}'";
            db_update('users', $data1, $where);
            $info_user = get_info_user_by_email($email);
            $data['user'] = $info_user;
            echo "<script type='text/javascript' >alert('Cập nhật tài khoản thành công!')</script>";
            // sleep(2);

            //    redirect();
        }
    }
    load_view('infoUser', $data);
}

    // function resetAction()
    // {
        // global $email,$error,$password;
        
        // $reset_token=$_GET['reset_token'];
        // if(!empty($reset_token))
        // {
        //     // $password="";
           
        //     if(check_reset_token($reset_token))
        //     {
        //         if(isset($_POST['btn-new-pass']))
        //         {
                    
        //             $error=array();
        //             if(empty($_POST['password']))
        //             {
        //                 $error['password']="Bạn cần điền mật khẩu";
        //             }
        //             else{
        //                 if(!(strlen($_POST['password'])>=6 && strlen($_POST['password'])<=32))
        //                 {
        //                     $error['password']="Mật khẩu từ 6 tới 32 kí tự";
        //                 }   
        //                 else {
        //                     // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        //                     if(!is_password($_POST['password']))
        //                     {
        //                         $error['password'] ="Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
        //                     }
        //                   else $password=md5($_POST['password']);
                            
                
        //                 }
        //                 if(empty($error))
        //                 {
        //                     $data=array(
        //                         'password'=>$password
        //                     );
        //                     update_pass($data,$reset_token);
        //                     redirect("?mod=user&action=resetOk");
        //                 }
                       
        //             }
        //         }
               
        //         load_view('newPass');
                
        //     }
        //     else{
        //         echo "Yêu cầu không  hợp lệ";
        //     }
            
        // }
        // else{
        // if(isset($_POST['btn_reset']))
        // {
        //     $error=array();
        //     if(empty($_POST['email']))
        //  {
        //         $error['email']="Bạn cần điền email";
                
        //   }
        //     else {
             
        //      // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        //      if(!is_email($_POST['email']))
        //      {
        //        $error['email'] ="Email không đúng định dạng ";
        //     }
        //     else {
        //         $email=$_POST['email'];
        //     }

        //      }
            
        //      if(empty($error))
        //      {
        //          if(check_mail($email))
        //          {
        //             $reset_token=md5($email.time());
        //             $data=array(
        //                 'reset_token'=> $reset_token
        //             );
        //             // Cập nhật mã  reset pass cho user cần khôi phục
        //             update_reset_token($data,$email);
        //             // gửi link khôi phục vào email của người dùng
        //             $link=base_url("?mod=user&action=reset&reset_token={$reset_token}");
        //             $content="<p>Bạn vui lòng click vào link sau để khôi phục mật khẩu: {$link}</p>
        //             <p>Nếu không phải yêu cầu của bạn, vui lòng bỏ qua  email này</p>
        //             <p>Black Hole</p>";
        //             send_mail($email,'','Khôi phục mật khẩu Quản lý danh bạ điện thoại',$content);
        //          }
        //          else{
        //             $error['account']="Gmail không tồn tại !";
        //         }
        //      }
            
        // }
        // $data['email']=$email;
        // $data['error']=$error;
        // load_view('reset');
    // }
    // }
    // function resetOKAction()
    // {
    //     load_view('resetOk');
    // }
