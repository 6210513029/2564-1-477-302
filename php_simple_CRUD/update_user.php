<?php
	session_start ();

		//13.display old info and update into users table
    include_once 'dbconnect.php';

	if (isset($_GET['user_id'])) {
		$sql = "SELECT * FROM users WHERE user_id = " . $_GET['user_id'];
		$result = mysqli_query($con, $sql);
		$row_update = mysqli_fetch_array($result);
		$user_id = $row_update['user_id'];
		$user_name = $row_update['user_name'];
		$user_email = $row_update['user_email'];
	}

	//check whether update buuton is clicked
	if (isset($_POST['update'])) {
		$user_id = $_POST['id'];
		$user_name = $_POST['name'];
		$user_email = $_POST['email'];
		$user_passwd = $_POST['password'];
		$user_cpasswd = $_POST['cpassword'];

		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$error_msg = "";

		//เช็ครูปแบบของ e-mail
		if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
			$validate_error = true;
			$error_msg = "E-mail is not correct.";
		}

		//ตรวจสอบความยาวของรหัสผ่าน ไม่น้อยกว่า 6 ตัว
		if (strlen($user_passwd) <6 ){
			$validate_error = true;
			$error_msg ="Password must be more then 6 charecters.";
		}

		//ตรวจสอบรหัสผ่าน และการยืนยันรหัสผ่าน
		if ($user_passwd != $user_cpasswd) {
			$validate_error = true;
			$error_msg = "Password and confirm password do not math.";
		}

		if (!$validate_error) {
			$sql = "UPDATE users SET user_name = '" . $user_name . "', user_email = '" . $user_email . "', user_passwd = '" . md5($user_passwd) . "' WHERE user_id = " . $user_id;

			if (mysqli_query($con, $sql)) {
				header ("location: show_user.php");
			} else {
				$error_msg = "Error updating record!";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
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
				<!-- extra step : change menu -->
				<?php if (isset($_SESSION['name']) && $_SESSION['name'] == 'admin') { ?>
					<li><p class = "navbar-text">Signed in as <?php echo $_SESSION['name'];?></p></li>
					<li><a herf = "logout.php">Log Out</p></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<li class="active"><a href="admin_login.php">Admin</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="updateform">
				<fieldset>
					<legend>Update</legend>

					<!--14.display old info in text field -->
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $user_id; ?>" />
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php echo $user_name; ?>" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php echo $user_email; ?>" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="update" value="Update" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<!--15.display message -->
			<span class = "text-danger"><?php if (isset($error_msg)) echo $error_msg; ?></span>

		</div>
	</div>
</div>
</body>
</html>