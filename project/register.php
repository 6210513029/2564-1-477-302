<?php
		//2.save regist info into database
		//2.1 เพิ่ม ข้อมูล user สำหรับ ฐานข้อมูล
		include_once "dbconnect.php"; //หรือใช้ require_once

		//เช็คว่า ฟอร์ม มีการกดปุ่ม submit โดยใช้คำสั่ง isset ($_POST['ชื่อปุ่ม'])
		if (isset($_POST['signup'])) {
			//ตรวจสอบข้อมูล
			$name = $_POST['user-name'];
			$email = $_POST['user-email'];
			$passwd = $_POST['user-password'];
			$cpasswd = $_POST['user-cpassword'];
			$phone = $_POST['user-phone'];

		//2.2 ตรวจสอบความถูกต้องของข้อมูล user 
		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$validate_msg = "";
		
		//เช็ครูปแบบของ e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$validate_error = true;
			$validate_msg = "อีเมลไม่ถูกต้อง";
		}

		//ตรวจสอบความยาวของรหัสผ่าน ไม่น้อยกว่า 8 ตัว
		if (strlen($passwd) <8 ){
			$validate_error = true;
			$validate_msg ="รหัสผ่านต้องมีอย่างน้อย 8 ตัว";
		}

		//ตรวจสอบรหัสผ่าน และการยืนยันรหัสผ่าน
		if ($passwd != $cpasswd) {
			$validate_error = True;
			$validate_msg = "รหัสผ่านและยืนยันรหัสไม่ตรงกัน";

		}

		if (!$validate_error){
			//เพิ่มข้อมูล project ในตาราง
			$sql = "INSERT INTO project(user_name, user_email, user_passwd, user_phone)
			VALUE('" . $name . "' , '" . $email . "' , '" . md5($passwd) . "' ,'" . $phone . "')"; 
	
			if (mysqli_query($con, $sql));
			//execute without error
			header("location: login.php");
			// header เป็นการลิ้งไปยังหน้า login โดยการใช้ location: ตามด้วยชื่อไฟล์ที่ต้องการให้ลิ้งไป 
			//เมื่อมีการกด signup จะไปอีกหน้าทันที
		} else {
			//error
		}
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME PETS</title>
	<!-- <meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- Font Awesome icons (free version)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Fonts CSS-->
	<link rel="stylesheet" href="css/heading.css">
    <link rel="stylesheet" href="css/body.css">

	<style>
    body {
		background-image: url('https://cdn.discordapp.com/attachments/901018276635750420/902391430994067557/3333333.jpg');
		background-size: 100% 100%, auto;
		background-repeat: no-repeat;
	}
    </style>
</head>
<body id="page-top">

	<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
        <div class="container">
			<a class="navbar-brand js-scroll-trigger" href="index.php"><img src="assets/img/image0_copy.png" height="55" width="55">      HOME PETS</a>
            <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://localhost/project/register.php">สมัครสมาชิก</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="login.php">เข้าสู่ระบบ</a>
                    </li>
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"href="admin.php">ผู้ดูแลระบบ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<header class="masthead">
        <div class="container d-flex align-items-center flex-column">
		<!-- <img src="assets/img/image0_copy.png" height="100" width="100"><br> -->
            <h1 class="masthead-heading mb-0 text-secondary text-center">สมัครสมาชิก</h1>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>

	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<div class="form-group">
						<label for="name">ชื่อ-นามสกุล</label>
						<input type="text" name="user-name" placeholder="ป้อนชื่อ-นามสกุล" required value="" class="form-control" />
					</div>

					<!-- <div class="form-group">
						<label for="name">ชื่อเล่น</label>
						<input type="text" name="user-nickname" placeholder="ป้อนชื่อเล่น" required value="" class="form-control" />
					</div> -->

					<div class="form-group">
						<label for="name">อีเมล</label>
						<input type="text" name="user-email" placeholder="ป้อนอีเมล" required value="" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">หมายเลขโทรศัพท์</label>
						<input type="text" name="user-phone" placeholder="ป้อนหมายเลขโทรศัพท์" required value="" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">รหัสผ่าน</label>
						<input type="password" name="user-password" placeholder="ป้อนรหัสผ่าน" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">ยืนยันรหัสผ่าน</label>
						<input type="password" name="user-cpassword" placeholder="ป้อนยืนยันรหัสผ่าน" required class="form-control" />
					</div>

					<!--3.display message แสดงข้อความ error ที่เกิดขึ้น -->
					<span class="text-danger">
					<?php
						if (isset($validate_error)){
							if($validate_error){
							echo $validate_msg;
							}
						}
					?>
					</span>

					<center>
					<div class="form-group">
						<input type="submit" name="signup" value="สมัครสมาชิก" class="btn btn-secondary"/>
					</div>
					</center>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 text-center">
		กรุณาคลิกปุ่มด้านล่างนี้ หากมีบัญชีแล้ว 
		<br><br>
		<button onclick="document.location='login.php'" class="btn btn-secondary">เข้าสู่ระบบ</button>
		
		</div>
	</div>
</div>
</header>

    <!-- Copyright Section-->
    <section class="copyright py-4 text-center text-white">
        <div class="container"><small class="pre-wrap">ผู้จัดทำ นายปกรณ์ ชิตพงษ์ | นางสาว ธันย์ชนก เจริญฟูประเสริฐ | นายธีรภัทร บ่าหมะ | PSU | FMS | BIS </small></div></section>
</body>
</html>