<?php
	session_start ();

		//13.display old info and update into users table
    include_once 'dbconnect.php';

	if (isset($_GET['user_id'])) {
		$sql = "SELECT * FROM post WHERE user_id = " . $_GET['user_id'];
		$result = mysqli_query($con, $sql);
		$row_update = mysqli_fetch_array($result);
		$user_id = $row_update['user_id'];
		// $type = $row_update['user_type'];
		$name = $row_update['user_name'];
		$breed = $row_update['user_breed'];
		$color = $row_update['user_color'];
		$gender = $row_update['user_gender'];
		$age = $row_update['user_age'];
		// $date = $row_update['user_date'];
		$location = $row_update['user_location'];
		$contact = $row_update['user_contact'];
		// $img = $row_update['user_img'];
	}

	//check whether update button is clicked
	if (isset($_POST['update'])) {
		$user_id = $_POST['id'];
		// $type =$_POST['user_type'];
		$name = $_POST['user_name'];
		$breed = $_POST['user_breed'];
		$color = $_POST['user_color'];
		$gender = $_POST['user_gender'];
		$age = $_POST['user_age'];
		// $date =$_POST['user_date'];
		$location =$_POST['user_location'];
		$contact =$_POST['user_contact'];
		// $img =$_POST['user_img'];

		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$error_msg = "";


		if (!$validate_error) {
			$sql = "UPDATE post SET user_name = '" . $name . "', user_breed = '" . $breed . "' , user_color = '" . $color . "', user_gender = '" . $gender . "' , user_age = '" . $age . "', user_location = '" . $location . "', user_contact = '" . $contact . "'  WHERE user_id = " . $user_id;
			
			if (mysqli_query($con, $sql)) {
				header ("location: show_user.php");
			} else {
				$error_msg = "อัปเดตข้อมูลไม่สำเร็จ";
			}
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
</head>

<body id="page-top">
	<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="index.php"><img src="assets/img/image0_copy.png" height="55" width="55">      HOME PETS</a>
            <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="index.php">Home pets</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php">ออกจากระบบ</a></li>
                </ul>
        	</div>
    	</div>
	</nav>

<header class="masthead bg-primary">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-5 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="updateform">
				<fieldset>
					
					<h1 class="masthead-heading mb-0 text-secondary text-center">อัปเดตข้อมูล</h1>
        			<!-- Icon Divider-->
       				 <div class="divider-custom">
           				<div class="divider-custom-line"></div>
            			<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            			<div class="divider-custom-line"></div>
        			</div>

					<!--14.display old info in text field -->
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $user_id; ?>" />

						<label for="name">ชื่อ</label>
						<input type="text" name="user_name"  required value="<?php echo $name; ?>" class="form-control" />
					</div>

					<!-- <div class="form-group">
					<label for="name">ประเภท</label>
						<br><center>
						<label for="name">สุนัข</label>
						<input type="radio" name="user_type" value="<?php echo $type; ?>"/><img src="https://cdn.discordapp.com/attachments/881810685317742603/900789788142096424/3089512.png" height="55" width="55">
						<label for="name">แมว</label>
						<input type="radio" name="user_type" value="<?php echo $type; ?>"/><img src="https://cdn.discordapp.com/attachments/881810685317742603/900789782878240798/1864514.png" height="55" width="55"></center>
					</div> -->

					<!-- <div class="form-group">
					<form action="" method="post" enctype="multipart/form-data">
						<center>	
						<input type="file" name="user_img" required value="<?php echo $img; ?>" accept="image/jpeg, image/png, image/jpg"> <br>
						<font color="secondary">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
						</center> -->
                        <!-- <button type="submit" class="btn btn-secondary">อัพโหลด</button> -->
                    <!-- </form>
					</div> -->

					
					<div class="form-group">
						<label for="name">พันธุ์</label>
						<input type="text" name="user_breed"  required value="<?php echo $breed; ?>" class="form-control" />
					</div>

					<div class="form-group">
					<label for="name">สี</label>
						<input type="text" name="user_color" required value="<?php echo $color; ?>" class="form-control" />
					</div>

					<div class="form-group">
					<label for="name">เพศ</label>
						<input type="text" name="user_gender" required value="<?php echo $gender; ?>" class="form-control">
					</div>

					<!-- <div class="form-group">
					<label for="name">เพศ</label>
                        <select name="user_gender"required value = "<?php echo $gender; ?>" class="form-control">
                            <option value="ตัวผู้">ตัวผู้</option>
                            <option value="ตัวเมีย">ตัวเมีย</option>
                            <option value="ไม่ทราบ">ไม่ทราบ</option>
                        </select>
					</div> -->

					<div class="form-group">
					<label for="name">อายุ</label>
						<input type="text" name="user_age"  required value="<?php echo $age; ?>" class="form-control" />
					</div>

					<div class="form-group">
					<label for="name">พิกัด</label>
						<input type="text" name="user_location"  required value="<?php echo $location; ?>" class="form-control" />
					</div>

					<div class="form-group">
					<label for="name">ติดต่อ</label>
						<input type="text" name="user_contact"  required value="<?php echo $contact; ?>" class="form-control" />
					</div>

					<center>
					<div class="form-group">
						<input type="submit" name="update" value="อัพเดต" class="btn btn-secondary"/>
					</div>
					</center>
				</fieldset>
				<!-- <button onclick="document.location='show_user.php'" class="btn btn-secondary">ย้อนกลับ</button> -->
			</form>
			<!--15.display message -->
			<span class = "text-danger"><?php if (isset($error_msg)) echo $error_msg; ?></span>
		</div>
	</div>
</div>
<!-- <br> -->
<center><button onclick="document.location='show_user.php'" class="btn btn-secondary">ย้อนกลับ</button></center>
</header>
<!-- Copyright Section-->
<section class="copyright py-4 text-center text-white">
<div class="container"><small class="pre-wrap">ผู้จัดทำ นายปกรณ์ ชิตพงษ์ | นางสาว ธันย์ชนก เจริญฟูประเสริฐ | นายธีรภัทร บ่าหมะ | PSU | FMS | BIS </small></div></section>
</body>
</html>