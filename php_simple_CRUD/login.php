<?php
		//4.check login info from users table
		//star using session
		session_start();
		
		include_once 'dbconnect.php';

		//check whether login button is clicked เช็คปุ่ม login 
		if (isset($_POST['login'])){
			$email = $_POST['login-email'];
			$passwd = $_POST['login-password'];

			$sql = "SELECT * FROM users WHERE user_email = '" . $email . "'
			AND user_passwd ='" . md5 ($passwd) ."'"; //ใส่md5 เพื่อเอาไว้เช็ครหัส

			//เข้าไปเช็คในคลังข้อมูลว่ามี user หรือ password นี้ไหม
			$result = mysqli_query($con, $sql); //mysqli_query เป็นการดำเนินงานการตรวจสอบค่าในตารางถ้าใส่ชื่อผู้ใช้งานและรหัสผ่านถูกต้อง มันจะรีเทิร์นกัลมาเป็น resultset และจะเลือกมา 1 record โดยที่ $con เป็นการบอกถึง dbconnect
			if ($row = mysqli_fetch_array($result)){ //จะดึง record ออกมา โดยใช้ mysqli_fetch_array เป็นการแปลง mysqli_fetch ให้เก็บใน array และเกํบในตัวแปร row
				$_SESSION['id'] = $row ['user_id']; //session ใช้ในการเก็บค่าข้อมูล ทุกครั้งที่จะใช้ session จะต้อง start ก่อน โดยการ session_start(); ไว้บนๆเลย บรรทัดที่ 4
				$_SESSION['name'] = $row ['user_name'];
				header("location: index.php"); //ให้ลิ้งไปที่ไฟล์ index.php
			} else {
				$error_mrg = "Incorrect e-mail or passwoed.";
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Login</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">PHP Simple CRUD</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<li><a href="admin_login.php">Admin</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="login-email" placeholder="Your Email" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="login-password" placeholder="Your Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
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
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		New User? <a href="register.php">Sign Up Here</a>
		</div>
	</div>
</div>
</body>
</html>