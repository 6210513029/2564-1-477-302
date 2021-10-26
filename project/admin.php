<?php
	//7.check admin username and password, set admin name as "admin" and password as "pass1234"
	session_start();

	if (isset($_POST['admin-login'])){
		$admin_name = $_POST['admin-name'];
		$admin_passwd = $_POST['admin-password'];
			
		if ($admin_name == 'homepets' && $admin_passwd == 'homepets1234') {
			$_SESSION['id'] = 0 ;
			$_SESSION['name'] = "Home Pets";
			header("location: show_user.php");
		} else {
			$error_msg = "ชื่อผู้ใช้งาน หรือ รหัสผ่านผิดพลาด";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<body>
<title>HOME PETS</title>
	
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
		background-image: url('https://scontent.fhdy4-1.fna.fbcdn.net/v/t1.15752-9/244339552_444598940627743_5333324061297924717_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeG-0exG5LUkce12Dukiy2cwDrnKnFyllQIOucqcXKWVAo-euIAG4jpOcFNDl1Y6ZR5tW9RLlxS8J4iPvhf8AwyW&_nc_ohc=7NJxoa33_OwAX_aV5ls&tn=UxDGxG67UlX56Cd8&_nc_ht=scontent.fhdy4-1.fna&oh=f5b684dd53a12f808961dc4d9f897459&oe=6199488C');
		background-size: 100% 100%, auto;
		background-repeat: no-repeat;
	}
    </style>
</head>
<body id="page-top">
	<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="index.php"><img src="assets/img/image0_copy.png" height="55" width="55">      HOME PETS</a>
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
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<br>
					<br>
					<br>
					<center><legend class="text-secondary">เข้าสู่ระบบ</legend></center>
					<br>
					<div class="form-group">
						<label for="name">ชื่อผู้ใช้งาน</label>
						<input type="text" name="admin-name" placeholder="ป้อนชื่อผู้ใช้งาน" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">รหัสผ่าน</label>
						<input type="password" name="admin-password" placeholder="ป้อนรหัสผ่าน" required class="form-control" />
					</div>

					<!--8.display message -->
					<span class="text-danger">
						<?php if (isset($error_msg)) { echo $error_msg; } ?>
					</span>
					<br>
					<center><div class="form-group">
						<input type="submit" name="admin-login" value="Login" class="btn btn-secondary" />
					</center></div>
					<br>
				</fieldset>
				<br>
			</form>
		</div>
	</div>
</div>
</header>
<br>
<br>
<br>
<!-- Copyright Section-->
<section class="copyright py-4 text-center text-white">
<div class="container"><small class="pre-wrap">ผู้จัดทำ นายปกรณ์ ชิตพงษ์ | นางสาว ธันย์ชนก เจริญฟูประเสริฐ | นายธีรภัทร บ่าหมะ | PSU | FMS | BIS </small></div></section>
</body>
</html>