<?php
    session_start();

    //9.fetch and delete record
    include_once 'dbconnect.php';

    // fetch records
    $sql = "SELECT * FROM post ORDER BY user_id ASC"; //มากไปน้อย DESC น้อยไปมาก ASC
    $result = mysqli_query($con, $sql);

    $cnt = 1;

    // delete record ลบการบันทึก
    if (isset($_GET['user_id'])) {
        $sql = "DELETE FROM post where user_id = " . $_GET['user_id'];
        mysqli_query($con, $sql);
        header("location: show_user.php");
    }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
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
                 <!-- extra step, change menu after login -->
                 <?php if (isset($_SESSION['name'])) { ?>
                    <!-- true -->
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">ผู้ดูแลระบบ <?php echo $_SESSION['name'] ?></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php">ออกจากระบบ</a></li>
                 <?php } else { ?>
                    <!-- false -->
     			    <li><a href="login.php">Login</a></li>
     			    <!-- <li class="active"><a href="admin_login.php">Admin</a></li> -->
                <?php } ?>
     		</ul>
     	</div>
                </ul>
            </div>
        </div>
    </nav>

 <header class="masthead bg-primary">
 <div class="container">
     <div class="row">
         <div class="col-xs-8 col-xs-offset-2">
           <br>
            <h1 class="masthead-heading mb-0 text-secondary text-center">ข้อมูลโพสต์หาบ้าน</h1>
        			<!-- Icon Divider-->
       				 <div class="divider-custom">
           				<div class="divider-custom-line"></div>
            			<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            			<div class="divider-custom-line"></div>
        			</div>

            <div class="table-responsive">
                <table class="table table-bordered  bg-white ">
                    <thead>
                     <tr>
                         <th>ID</th>
                         <th>ประเภท</th>
                         <th>ชื่อ</th>
                         <th>พันธุ์</th>
                         <th>สี</th>
                         <th>เพศ</th>
                         <th>อายุ</th>
                         <th>วันที่โพสต์</th>
                         <th>พิกัด</th>
                         <th>ติดต่อ</th>
                         <th>รูปภาพ</th>
                         <th colspan="2" style="text-align:center">กิจกรรม</th>
                     </tr>
                </thead>
            <tbody>

                <!--10.show all users in this part of table ใช้วน loop ด้วยคำสั่ง while -->
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $cnt++; ?></td>
                        <td><?php echo $row['user_type'];?></td>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['user_breed'];?></td>
                        <td><?php echo $row['user_color'];?></td>
                        <td><?php echo $row['user_gender'];?></td>
                        <td><?php echo $row['user_age'];?></td>
                        <td><?php echo $row['user_date'];?></td>
                        <td><?php echo $row['user_location'];?></td>
                        <td><?php echo $row['user_contact'];?></td>
                        <td><?php echo $row['user_img'];?></td>
                        <td><input type="button" value="แก้ไข" name="btn-edit" class="btn btn-secondary" onclick = "update_user (<?php echo $row['user_id']; ?>);"></td>
                        <td><input type="button" value="ลบ" name="btn-delete" class="btn btn-danger" onclick ="delete_user (<?php echo $row['user_id']; ?>);"></td>
                    </tr>
                <?php } ?>
                </tbody>
             </table>
            </div>
            <!--12.display number of records -->
            <center><div>มีข้อมูลทั้งหมด <?php echo mysqli_num_rows($result) . " ข้อมูล"; ?></div></center>
        </div>
     </div>
 </div>
 <!--11.JavaScript for edit and delete actions -->
     <script>
        //delete
        function delete_user(id) {
            if (confirm("คุณต้องการลบข้อมูลหรือไม่ ?")) {
                window.location.href = "show_user.php?user_id=" + id;
            }
        }
        //update
        function update_user(id) {
            window.location.href = "update_user.php?user_id=" + id;
        }
    </script>
</header>
<!-- Copyright Section-->
<section class="copyright py-4 text-center text-white">
<div class="container"><small class="pre-wrap">ผู้จัดทำ นายปกรณ์ ชิตพงษ์ | นางสาว ธันย์ชนก เจริญฟูประเสริฐ | นายธีรภัทร บ่าหมะ | PSU | FMS | BIS </small></div></section>
 </body>
 </html>