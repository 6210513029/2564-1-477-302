<?php
		//2.save regist info into database
		//2.1 เพิ่ม ข้อมูล user สำหรับ ฐานข้อมูล
		include_once "dbconnect.php"; //หรือใช้ require_once

		//เช็คว่า ฟอร์ม มีการกดปุ่ม submit โดยใช้คำสั่ง isset ($_POST['ชื่อปุ่ม'])
		if (isset($_POST['send'])) {
			//ตรวจสอบข้อมูล
			$type =$_POST['user_type'];
			$name = $_POST['user_name'];
			$breed = $_POST['user_breed'];
			$color = $_POST['user_color'];
			$gender = $_POST['user_gender'];
			$age = $_POST['user_age'];
			$date =$_POST['user_date'];
			$location =$_POST['user_location'];
			$contact =$_POST['user_contact'];
			$img = basename($_FILES["user_img"]["name"]);
			//$path="upload/" . $img;
	
			$img_type = $_FILES['user_img']['type'];
			$size = $_FILES['user_img']['size'];
			$img_temp = $_FILES['user_img']['tmp_name'];
			
			$path = "upload/" . $img;
			// if (!file_exists($path)){
			// 	move_uploaded_file($img_temp, 'upload/' .$img);
			// }
			// if($upload !='') {
			// 	$path="upload/";
			// 	//คัดลอกไฟล์ไปยังโฟลเดอร์
			// 	move_uploaded_file($_FILES['user_img'],$img ); 
			// }

			if (empty($img)){
				$validate_msg ="กรุณาเลือกรูปภาพ";
			} else if ($img_type == "image/jpg" || $img_type == "image/jpeg" || $img_type == "image/png" || $img_type == "image/gif") {
				if (!file_exists($path)){ //เช็คว่ามีไฟล์ที่อัปไหม
					if ($size < 5000000) { //เช็คขนาดไฟล์ ไม่เกิน 5 mb
						move_uploaded_file($img_temp, 'upload/' .$img); //เป็นการย้ายไฟล์ที่อัปไปยังโฟลเดอ upload
					} else {
						$validate_msg = "รูปภาพของคุณมีขนาดใหญ่เกิน 5 MB"; //เป็นการแจ้งว่าไฟล์มีขนาดใหญ่เกิน
					}
				} else {
					$validate_msg = "คุณยังไม่อัปโหลดรูปภาพ";
				}
			} else {
				$validate_msg = "กรุณาอัปโหลดรูปภาพที่มีนามสกุลเป็น JPG , JPEG , PNG และ GIF";
			}
		
		//2.2 ตรวจสอบความถูกต้องของข้อมูล user 
		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$validate_msg = "";

		if (!$validate_error){
			//เพิ่มข้อมูล project ในตาราง
			$sql = "INSERT INTO post(user_type, user_name, user_breed, user_color, user_gender , user_age, user_date, user_location, user_contact , user_img)
			VALUE('" . $type . "' , '" . $name . "' , '" . $breed . "' , '" . $color . "' , '" . $gender . "' , '" . $age . "' , '" . $date . "' , '" . $location . "' , '" . $contact . "' , '" . $img . "')"; 
	
			if (mysqli_query($con, $sql));
			//execute without error

			header("location: index.php");

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

	<!-- <style>
    body {
		background-image: url('https://cdn.discordapp.com/attachments/881810685317742603/900372286266286190/246780546_293959982554217_580140740669888148ff4_n.jpg');
		background-size: 100% 100%, auto;
		background-repeat: no-repeat;
	}
    </style> -->
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
<!-- <nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid"> -->
		<!-- add header -->
		<!-- <div class="navbar-header"> -->
			<!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button> -->
			
			<!-- <a class="navbar-brand" href="index.php">สมัครสมาชิก Home Pets</a>
		</div> -->
		<!-- menu items -->
		<!-- <div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php">Login</a></li>
				<li class="active"><a href="register.php">Sign Up</a></li> -->
				<!-- <li><a href="admin_login.php">Admin</a></li> -->
			<!-- </ul>
		</div>
	</div>
</nav> -->

<header class="masthead bg-primary">
    <div class="container d-flex align-items-center flex-column">
	<!-- <img src="assets/img/image0_copy.png" height="100" width="100"><br> -->
        <h1 class="masthead-heading mb-0 text-secondary text-center">โพสต์หาบ้าน</h1>
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
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data" name="sendform">
				<fieldset>
					<div class="form-group">
						<label for="name">ประเภท</label>
						<center><br>
						<label for="name">สุนัข</label>
						<input type="radio" name="user_type" value="สุนัข"><img src="https://cdn.discordapp.com/attachments/881810685317742603/900789788142096424/3089512.png" height="55" width="55">
						<label for="name">แมว</label>
						<input type="radio" name="user_type" value="แมว"><img src="https://cdn.discordapp.com/attachments/881810685317742603/900789782878240798/1864514.png" height="55" width="55">
						</center>
					</div>

					<!-- <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="img_name" required class="form-control" placeholder="ชื่อภาพ"> <br>
						<label for="name">รูปภาพ</label>
                        <input type="file" name="img_file" required accept="image/jpeg, image/png, image/jpg">
						<font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font><br><br>
                        <button type="submit" class="btn btn-secondary">อัปโหลด</button>
                    </form>-->

					<!-- <form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">รูปภาพ</label>
						<input type="file" name="user_img">
					</div>
					</form>
					 -->

					
					<div class="form-group">
					
						<!-- <center> -->
						<label for="name">รูปภาพ</label>
						<input type="file" name="user_img" id="user_img" required  accept="image/jpeg, image/png, image/jpg">
						<!-- <input type="file" name="user_img" > <br> -->
						<font color="secondary">*อัพโหลดได้เฉพาะ JPG , JPEG , PNG และ GIF </font>
						</center>
                        <!-- <button type="submit" class="btn btn-secondary">อัพโหลด</button> -->
					
					</div>
					
					<div class="form-group">
						<label for="name">ชื่อ</label>
						<input type="text" name="user_name" placeholder="เช่น โกโก้ , แพนด้า" required value="" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">พันธุ์</label>
						<input type="text" name="user_breed" placeholder="เช่น พุดเดิ้ล , สกอตติชโฟลด์ , เปอร์เซีย" required value="" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">สี</label>
						<input type="text" name="user_color" placeholder="เช่น ดำ , ขาว , สามสี" required value="" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">เพศ</label>
						<input type="text" name="user_gender" placeholder="เช่น ตัวผู้ หรือ ตัวเมีย" required value="" class="form-control" />
					</div>

					<!-- <div class="form-group">
						<label for="name">เพศ</label>
                        <select name="user_gender"required class="form-control">
                            <option value="ตัวผู้">ตัวผู้</option>
                            <option value="ตัวเมีย">ตัวเมีย</option>
                            <option value="ไม่ทราบ">ไม่ทราบ</option>
                        </select>
					</div> -->

					<div class="form-group">
						<label for="name">อายุ</label>
						<input type="text" name="user_age" placeholder="เช่น 2 ปี 3 เดือน " required class="form-control" />
					</div>

                    <div class="form-group">
						<label for="name">วันที่โพสต์</label>
						<input type="date" name="user_date" required class="form-control" />
					</div>

                    <div class="form-group">
						<label for="name">พิกัด</label>
						<input type="text" name="user_location" placeholder="กรอกที่อยู่ผู้โพสต์" required class="form-control" />
					</div>

                    <div class="form-group">
						<label for="name">ติดต่อ</label>
						<input type="text" name="user_contact" placeholder="เช่น เบอร์โทรศัพท์ , Facebook" required class="form-control" />
					</div>
					
					<center>
					<div class="form-group">
						<input type="submit" name="send" value="โพสต์" class="btn btn-secondary"/>
					</div>
					<button onclick="document.location='index.php'" class="btn btn-secondary">ย้อนกลับ</button>
					</center>
				</fieldset>
			</form>
			<!--3.display message แสดงข้อความ error ที่เกิดขึ้น -->
			<?php
				if (isset($validate_error)){
					if($validate_error){
						echo $validate_msg;
					}
				}
			?>
		</div>
	</div>
	<!-- <div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 text-center">
		กรุณาคลิกปุ่มด้านล่างนี้ หากมีบัญชีแล้ว 
		<br><br>
		<button onclick="document.location='login.php'" class="btn btn-secondary">เข้าสู่ระบบ</button>
		</div>
	</div> -->
</div>
</header>

    <!-- Copyright Section-->
    <section class="copyright py-4 text-center text-white">
        <div class="container"><small class="pre-wrap">ผู้จัดทำ นายปกรณ์ ชิตพงษ์ | นางสาว ธันย์ชนก เจริญฟูประเสริฐ | นายธีรภัทร บ่าหมะ | PSU | FMS | BIS </small></div></section>
</body>
</html>