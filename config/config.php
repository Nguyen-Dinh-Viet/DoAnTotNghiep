<?php


session_start();
ob_start();
date_default_timezone_set("Asia/Ho_Chi_Minh"); // thêm thời gian
/*
 * ---------------------------------------------------------
 * BASE URL
 * ---------------------------------------------------------
 * Cấu hình đường dẫn gốc của ứng dụng
 * Ví dụ: 
 * http://hocweb123.com đường dẫn chạy online 
 * http://localhost/yourproject.com đường dẫn dự án ở local
 * 
 */

$config['base_url'] = "http://localhost:8080/Accounting-Software";
// $config['base_url'] = "http://localhost/003_Co_Hien/ke_toan/Accounting-Software";
//  $config['base_url'] = "https://blackholemta.space";

$config['default_module'] = 'home';
$config['default_controller'] = 'index';
$config['default_action'] = 'index';













