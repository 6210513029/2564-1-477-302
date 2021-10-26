<?php
	session_start();
	include_once 'dbconnect.php';
    
    //dog
    $sql_dog = "select * from post where user_type = 'สุนัข' order by user_id";
    $result_dog = mysqli_query($con, $sql_dog);

    //cat
    $sql_cat = "select * from post where user_type = 'แมว' order by user_id";
    $result_cat = mysqli_query($con, $sql_cat);
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HOME PETS</title>
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
        <div class="container">
            <!-- <img src="assets/img/image0_copy.png" height="65" width="65"> -->
            <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="assets/img/image0_copy.png" height="55" width="55">      HOME PETS</a>
            
            <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#home">หน้าหลัก</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#dog">สุนัข</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#cat">แมว</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#post">โพสต์หาบ้าน</a>
                    </li>
                    <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#portfolio">ตามหาสัตว์หาย</a>
                    </li> -->
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#contact">ติดต่อเรา</a>

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <header class="masthead bg-primary text-white text-center">
    <!-- แจ้งเตือน -->
        <div class="container">
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                <div class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"></a>
	            <!--6.if already logged in, change menu items --> 
	            <!-- isset เป็นคำถาม  yes no true false ถ้า login ผ่าน จะแสดงหน้าต่าง -->
                    <?php if (isset($_SESSION['id'])) { ?>
                        <a><p class="text-secondary">ยินดีต้อนรับ คุณ<?php echo $_SESSION['name']; ?> เข้าสู่เว็บไซต์ Home Pets ของเรา</p></a>
		            <?php } else { ?>
			            <!-- <li><a href="login.php">Login</a></li>
			            <li><a href="register.php">Sign Up</a></li> -->
		            <?php } ?>
                </div>
            </div>
        </div>

        <!-- ส่วนที่อยู่ใต้แถบเมนู พวกโลโก้ ชื่อเว็บ -->
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="assets/img/image0_copy.png" alt="">
            <!-- Masthead Heading-->
            <h1 class="masthead-heading mb-0">HOME PETS</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="pre-wrap masthead-subheading text-center font-weight-light mb-0">เว็บไซต์ประชาสัมพันธ์สำหรับหาบ้านให้สุนัขและแมว</p>
        </div>
    </header>

    <!-- หน้าหลัก -->
    <section class="page-section" id="home">
        <div class="container">
            
            <!-- Contact Section Heading-->
            <div class="text-center">
                <h2 class="page-section-heading text-secondary d-inline-block mb-0">หน้าหลัก</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Content-->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="d-flex flex-column align-items-center">
                        <div class="lead font-weight-bold" style="text-indent: 2.5em;">Home Pets เป็นเว็บไซต์ประชาสัมพันธ์ตามหาน้องหมาน้องเเมวเเละเป็นเว็บไซต์ที่ผู้ดูแลสัตว์เลี้ยง สามารถนำสุนัขเเละเเมวมาโพสลงเว็บไซต์เพื่อให้คนที่สนใจรับเลี้ยงต่อเข้ามาดูรายละเอียดของสัตว์เลี้ยงเเละสามารถติดต่อเพื่อรับเลี้ยงกับเจ้าของสัตว์เลี้ยงได้โดยตรง
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- สุนัข -->
    <section class="page-section portfolio bg-primary" id="dog">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <div class="text-center">
                <h2 class="page-section-heading text-white mb-0 d-inline-block">สุนัข</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Items-->
                <!-- 1 -->
                <?php 
                    while($row_dog = mysqli_fetch_array($result_dog)) { 
                ?>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal0" id="dog-card" data-id=<?php echo $row_dog['user_id']; ?> data-user-type=<?php echo $row_dog['user_type']; ?> data-user-name=<?php echo $row_dog['user_name']; ?> data-user-breed=<?php echo $row_dog['user_breed']; ?> data-user-color=<?php echo $row_dog['user_color']; ?> data-user-gender=<?php echo $row_dog['user_gender']; ?> data-user-age=<?php echo $row_dog['user_age']; ?> data-user-date=<?php echo $row_dog['user_date']; ?> data-user-location=<?php echo $row_dog['user_location']; ?> data-user-contact=<?php echo $row_dog['user_contact']; ?> data-user-img=<?php echo $row_dog['user_img']; ?> >

                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                                <!-- <div></div> -->
                            </div>
                            <a href="#" ><img class="img-fluid" src="<?php echo "upload/" . $row_dog['user_img']; ?>  " alt="Log Cabin" />
                            </a>
                            
                        </div>
                    </div>
                <?php } ?>

    <!-- Portfolio Modal-->
    <!-- 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal0" tabindex="-1" role="dialog"
        aria-labelledby="#portfolioModal0Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="fas fa-times"></i></span></button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary mb-0">น้องหมาน้องแมวหาบ้าน</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                    <img id="user-img" src="" height="407" width="550"><br><br>
            
                                        <span id="user-id"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span id="user-type"></span> <br>
                                        <span id="user-name"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span id="user-breed"></span> <br>
                                        <span id="user-color"></span> &nbsp;&nbsp;
                                        <span id="user-gender"></span> &nbsp;&nbsp;
                                        <span id="user-age"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                                        <span id="user-date"></span> <br>
                                        <span id="user-location"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <p id="user-contact"></p>
                                        <!-- <p id="user-type">รูปภาพ</p> -->

                                <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                        class="fas fa-times fa-fw"></i>Close Window</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- แมว -->
    <section class="page-section portfolio bg" id="cat">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <div class="text-center">
                <h2 class="page-section-heading text-secondary mb-0 d-inline-block">แมว</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Items-->
                <!-- 1  แมว -->
                <?php 
                    while($row_cat = mysqli_fetch_array($result_cat)) { 
                ?>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal0" id="cat-card" data-id=<?php echo $row_cat['user_id']; ?> data-user-type=<?php echo $row_cat['user_type']; ?> data-user-name=<?php echo $row_cat['user_name']; ?> data-user-breed=<?php echo $row_cat['user_breed']; ?> data-user-color=<?php echo $row_cat['user_color']; ?> data-user-gender=<?php echo $row_cat['user_gender']; ?> data-user-age=<?php echo $row_cat['user_age']; ?> data-user-date=<?php echo $row_cat['user_date']; ?> data-user-location=<?php echo $row_cat['user_location']; ?> data-user-contact=<?php echo $row_cat['user_contact']; ?> data-user-img=<?php echo $row_cat['user_img']; ?> >

                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                                <!-- <div></div> -->
                            </div>
                            <a href="#" ><img class="img-fluid" src="<?php echo "upload/" . $row_cat['user_img'] ; ?>  " alt="" />
                            </a>
                            
                        </div>
                    </div>
                <?php } ?>
                
            </div>
        </div>

    <!-- Portfolio Modal-->
    <!-- 1  แมว-->
    
    <div class="portfolio-modal modal fade" id="portfolioModal0" tabindex="-1" role="dialog"
        aria-labelledby="#portfolioModal0Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="fas fa-times"></i></span></button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary mb-0">น้องหมาน้องแมวหาบ้าน</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                            
                                <!-- <img class="img-fluid rounded mb-5"
                                    src="upload/" alt="Log Cabin" id="cat-img"  /> -->
                                    <?php while($row_cat = mysqli_fetch_array($result_cat)) { ?>
                                        <div class="col-md-6 col-lg-4 mb-5"></div>
                                        <img id="user-img" class="img-fluid" src=""/>
                                    <?php } ?>
                                    <img id="user-img" src="" height="407" width="550"><br><br>
        
                                    <span id="user-id"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="user-type"></span> <br>
                                    <span id="user-name"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="user-breed"></span> <br>
                                    <span id="user-color"></span> &nbsp;&nbsp;
                                    <span id="user-gender"></span> &nbsp;&nbsp;
                                    <span id="user-age"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                                    <span id="user-date"></span> <br>
                                    <span id="user-location"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <p id="user-contact"></p>
                                        <!-- <p id="user-type">รูปภาพ</p> -->

                                    <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                        class="fas fa-times fa-fw"></i>Close Window</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- โพสต์หาบ้าน -->
    <section class="page-section bg-primary text-white mb-0" id="post">
        <div class="container">
            <!-- About Section Heading-->
            <div class="text-center">
                <h2 class="page-section-heading d-inline-block text-white">โพสต์หาบ้าน</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="row justify-content-center">
		        <div class="col-md-4 col-md-offset-4 text-center">
                    คลิกปุ่มด้านล่างนี้ หากท่านต้องการกรอกโพสต์สำหรับหาบ้านให้น้องหมาและน้องแมว
                    <br><br>
                    <button onclick="document.location='post.php'" class="btn btn-secondary">หาบ้าน</button>
		        </div>
	            </div>
        </div>
    </section>

    <!-- ติดต่อเรา -->

    <footer class="footer text-center" id="contact">
        <style>
            section {
                padding: 0.2rem 0;
            }

            .page-section .page-section-heading {
                font-size: 2.25rem;
                line-height: 2rem;
            }
        </style>
        <section class="page-contact">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="mb-4">LOCATION</h4>
                    <center>
                        <div class="icon-contact mb-3"><i class="fas fa-star"></i></div>
                    </center>
                    <p class="pre-wrap lead mb-0">15 ถนน กาญจนวณิชย์ ตำบลคอหงส์ อำเภอหาดใหญ่ จังหวัดสงขลา 90112</p><br>
                    <a href="https://www.fms.psu.ac.th/">คณะวิทยาการจัดการ มหาวิทยาลัยสงขลานครินทร์</a>
                </div>
                <!-- Footer Phone-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="mb-4">PHONE</h4>
                    <center>
                        <div class="icon-contact mb-3"><i class="fas fa-mobile-alt"></i></div>
                    </center>
                    <p class="pre-wrap lead mb-0">(+66) 1234-567</p>
                </div>
                <!-- Footer E-mail-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="mb-4">E-MAIL</h4>
                    <center>
                        <div class="icon-contact mb-3"><i class="far fa-envelope"></i></div>
                    </center>
                    <p class="pre-wrap lead mb-0">6210513012@psu.ac.th <br>6210513029@psu.ac.th <br>6210513031@psu.ac.th
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright Section-->
    <section class="copyright py-4 text-center text-white">
        <div class="container"><small class="pre-wrap">ผู้จัดทำ นายปกรณ์ ชิตพงษ์ | นางสาว ธันย์ชนก เจริญฟูประเสริฐ | นายธีรภัทร บ่าหมะ | PSU | FMS | BIS </small></div></section>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed"><a
            class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
                class="fa fa-chevron-up"></i></a></div>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <style>
    footer 
            section {
                padding: 0.2rem 0;
            }

            .page-section .page-section-heading {
                font-size: 2.25rem;
                line-height: 2rem;
            }
        </style>

    <script>
        $(document).ready(function(){
            $(document).on('click', '#dog-card', function(e){
                e.preventDefault();
                var user_img = $(this).data('user-img');
                var user_id = $(this).data('id');
                var user_type = $(this).data('user-type');
                var user_name = $(this).data('user-name');
                var user_breed = $(this).data('user-breed');
                var user_color = $(this).data('user-color');
                var user_gender = $(this).data('user-gender');
                var user_age = $(this).data('user-age');
                var user_date = $(this).data('user-date');
                var user_location = $(this).data('user-location');
                var user_contact = $(this).data('user-contact')
                
                //modal
                $('#user-id').html("ID : " + user_id);
                $('#user-type').html("ประเภท : " + user_type);
                $('#user-name').html("ชื่อ : " + user_name);
                $('#user-breed').html("พันธุ์ : " + user_breed);
                $('#user-color').html("สี : " + user_color);
                $('#user-gender').html("เพศ : " + user_gender);
                $('#user-age').html("อายุ : " + user_age);
                $('#user-date').html("วันที่โพสต์ : " + user_date);
                $('#user-location').html("ตำแหน่ง : " + user_location);
                $('#user-contact').html("ช่องทางการติดต่อ : " + user_contact);
                $('#user-img').attr('src',"upload/"+user_img);
                console.log(user_id);
                console.log(user_img);
                // console.log(user_img);

            });
        });

        $(document).ready(function(){
            $(document).on('click', '#cat-card', function(e){
                e.preventDefault();
                var user_img = $(this).data('user-img');
                var user_id = $(this).data('id');
                var user_type = $(this).data('user-type');
                var user_name = $(this).data('user-name');
                var user_breed = $(this).data('user-breed');
                var user_color = $(this).data('user-color');
                var user_gender = $(this).data('user-gender');
                var user_age = $(this).data('user-age');
                var user_date = $(this).data('user-date');
                var user_location = $(this).data('user-location');
                var user_contact = $(this).data('user-contact');
                
                //modal
                $('#user-id').html("ID : " + user_id);
                $('#user-type').html("ประเภท : " + user_type);
                $('#user-name').html("ชื่อ : " + user_name);
                $('#user-breed').html("พันธุ์ : " + user_breed);
                $('#user-color').html("สี : " + user_color);
                $('#user-gender').html("เพศ : " + user_gender);
                $('#user-age').html("อายุ : " + user_age);
                $('#user-date').html("วันที่โพสต์ : " + user_date);
                $('#user-location').html("ตำแหน่ง : " + user_location);
                $('#user-contact').html("ช่องทางการติดต่อ : " + user_contact);
                $('#user-img').attr('src',"upload/"+user_img);
                console.log(user_id);
                console.log(user_img);

            });
        });
        
    </script>
</body>
</html>