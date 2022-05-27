<?php
	function check_login($email,$password){
		$check_user=db_num_rows("SELECT * FROM `users` WHERE `user_email`='{$email}' AND `user_password`='{$password}' AND `activate` =  '1'" );
	   if($check_user)
	   return true;
	   return false;
	
	} 
	// lấy thông tin người dùng
	function get_info_user()
	{
		if(is_login())
		{
			if(!empty($_COOKIE['is_login']))
			{
				$info = db_fetch_row("SELECT * FROM `users` where `user_email` = '{$_COOKIE['user_name']}'");
			}
			else {
				$info = db_fetch_row("SELECT * FROM `users` where `user_email` = '{$_SESSION['user_login']}'");
			}
			return $info;
		}
		return false;
	}
	// Kiểm tra login hay chưa
	function is_login()
	{
		if(is_remember_me())
		{
			return true;
		}
		else if(isset($_SESSION['is_login']))
			return true;
		return false;
	}
	//Trả về user của người login

	function user_login()
	{
		if(!empty($_SESSION['user_login']))
			return $_SESSION['user_login'];
		return false;
	}
	// trả về thông tin user
	function info_user($field='id')
	{
		global $list_users;
		if(isset($_SESSION['is_login']))
		{
			foreach ($list_users as $user) {
				if($_SESSION['user_login']==$user['username'])
				{
					//Kiểm tra key có tồn tại trong mảng hay ko
					if(array_key_exists($field, $user))
						return $user[$field];


				}
			}
		}
			
			return false;
	}
	// kiểm tra xem có nhớ đăng nhập ko
	function is_remember_me()
	{
		if(!empty($_COOKIE['is_login']))
		return true;
		return false;
	}

	// Lấy thời gian
	function sw_get_current_weekday() {
		$weekday = date("l");
		$weekday = strtolower($weekday);
		switch($weekday) {
			case 'monday':
				$weekday = 'Thứ hai';
				break;
			case 'tuesday':
				$weekday = 'Thứ ba';
				break;
			case 'wednesday':
				$weekday = 'Thứ tư';
				break;
			case 'thursday':
				$weekday = 'Thứ năm';
				break;
			case 'friday':
				$weekday = 'Thứ sáu';
				break;
			case 'saturday':
				$weekday = 'Thứ bảy';
				break;
			default:
				$weekday = 'Chủ nhật';
				break;
		}
		return $weekday.', '.date('d/m/Y');
	}
	// 
	
?>