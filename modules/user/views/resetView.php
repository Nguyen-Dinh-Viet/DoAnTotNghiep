<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý danh bạ</title>

	<link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link  rel="stylesheet" type="text/css" href="public/style.css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
      
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/app.js" type="text/javascript"></script>
    <link rel="stylesheet" href="public/css/import/login.css">
</head>
<style>
        .error{
            color: red;
        }
        h1{
        	font-size: 1.7rem;
        	font-weight: bold;

        }

    </style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="wrapper">
		<div id="wp-form-login">
			<h1 class="mx-3">Lấy lại mật khẩu</h1>
			<form action="" method="POST" id="form-login">
			<input id="email" type="email" name="email" value="<?php echo set_value('email') ?>" placeholder="Email">
				<?php echo form_error('email')?>
				
             
			<input id="button" type="submit" name="btn_reset" value="Xác nhận">
			</form>
			<a href="<?php echo base_url("?mod=user&action=reg") ?>">Đăng ký</a><span> | </span><a href="<?php echo base_url("?mod=user&action=login") ?>">Đăng nhập</a>
		</div>
	</div>
			</div>
		</div>
	</div>
	
</body>
</html> -->