<?php
		//4.check login info from users table
		//star using session
		session_start();
		
		include_once 'dbconnect.php';

		//check whether login button is clicked เช็คปุ่ม login 
		if (isset($_POST['login'])){
			$email = $_POST['login-email'];
			$passwd = $_POST['login-password'];

			$sql = "SELECT * FROM project WHERE user_email = '" . $email . "'
			AND user_passwd ='" . md5 ($passwd) ."'"; //ใส่md5 เพื่อเอาไว้เช็ครหัส

			//เข้าไปเช็คในคลังข้อมูลว่ามี user หรือ password นี้ไหม
			$result = mysqli_query($con, $sql); //mysqli_query เป็นการดำเนินงานการตรวจสอบค่าในตารางถ้าใส่ชื่อผู้ใช้งานและรหัสผ่านถูกต้อง มันจะรีเทิร์นกัลมาเป็น resultset และจะเลือกมา 1 record โดยที่ $con เป็นการบอกถึง dbconnect
			if ($row = mysqli_fetch_array($result)){ //จะดึง record ออกมา โดยใช้ mysqli_fetch_array เป็นการแปลง mysqli_fetch ให้เก็บใน array และเกํบในตัวแปร row
				$_SESSION['id'] = $row ['user_id']; //session ใช้ในการเก็บค่าข้อมูล ทุกครั้งที่จะใช้ session จะต้อง start ก่อน โดยการ session_start(); ไว้บนๆเลย บรรทัดที่ 4
				$_SESSION['name'] = $row ['user_name'];
				header("location: index.php"); //ให้ลิ้งไปที่ไฟล์ index.php
			} else {
				$error_mrg = "Incorrect e-mail or password.";
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- ชื่อเว็บ -->
	<<title>HOME PETS</title>
	<!-- ลิ้ง css ใช้ boot -->
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
		background-image: url('https://media.discordapp.net/attachments/877442031650217995/899942796411162654/image0.jpg?width=992&height=701');
		background-size: 100% 100%, auto;
		background-repeat: no-repeat;
	}
    </style>
</head>

<body id="page-top">
<!-- แถบเมนู ด้านบนสุด -->
	<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
		<div class="container"><a class="navbar-brand js-scroll-trigger" href="index.php"><img src="assets/img/image0_copy.png" height="55" width="55">      HOME PETS</a>
            <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://localhost/project/register.php">สมัครสมาชิก</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php">เข้าสู่ระบบ</a></li>
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"href="admin.php">ผู้ดูแลระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>

<header class="masthead">
	<div class="container d-flex align-items-center flex-column">
		<h1 class="masthead-heading mb-0 text-secondary text-center">เข้าสู่ระบบ</h1><br>


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<div class="form-group">
						<label for="name">อีเมล</label>
						<input type="text" name="login-email" placeholder="ป้อนอีเมล" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">รหัสผ่าน</label>
						<input type="password" name="login-password" placeholder="ป้อนรหัสผ่าน" required class="form-control" />
					</div>

					<center>
					<div class="form-group">
						<input type="submit" name="login" value="เข้าสู่ระบบ" class="btn btn-secondary"/>
					</div>
					</center>
				</fieldset>
			</form>

			<!--5.display message แสดงข้อความที่กรอกผิด danger แสดงสีแดง -->
			<span class="text-danger">
				<?php 
					if (isset($error_mrg)) {
						echo $error_mrg; //ถ้ามี error ให้แสดงข้อความ
					}
				?>
			</span>

		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 text-center">
		สมัครบัญชีใหม่ 
		<br><br>
		<button onclick="document.location='register.php'" class="btn btn-secondary">สมัครสมาชิก</button>
		<!-- <button onclick="document.location='HOME PETS.html'" class="btn btn-secondary">Home Pets</button> -->
		</div>
	</div>
</div>
</header>

    <!-- Copyright Section-->
    <section class="copyright py-4 text-center text-white">
        <div class="container"><small class="pre-wrap">ผู้จัดทำ นายปกรณ์ ชิตพงษ์ | นางสาว ธันย์ชนก เจริญฟูประเสริฐ | นายธีรภัทร บ่าหมะ | PSU | FMS | BIS </small></div></section>

</body>
</html>