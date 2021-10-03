<?php
    session_start();

    //9.fetch and delete record
    include_once 'dbconnect.php';

    // fetch records
    $sql = "SELECT * FROM users ORDER BY user_id DESC"; //มากไปน้อย DESC น้อยไปมาก ASC
    $result = mysqli_query($con, $sql);

    $cnt = 1;

    // delete record ลบการบันทึก
    if (isset($_GET['user_id'])) {
        $sql = "DELETE FROM users where user_id = " . $_GET['user_id'];
        mysqli_query($con, $sql);
        header("location: show_user.php");
    }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" >
     <title>PHP Admin | Users</title>
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
                 <!-- extra step, change menu after login -->
                 <?php if (isset($_SESSION['name'])) { ?>
                    <!-- true -->
                    <li><p class = "navbar-text">Signed in as <?php echo $_SESSION['name'] ?></p></li>
                    <li><a href="logout.php">Log Out</a></li>
                 <?php } else { ?>
                    <!-- false -->
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
         <div class="col-xs-8 col-xs-offset-2">
             <legend>Show All Users</legend>

            <div class="table-responsive">
             <table class="table table-bordered table-hover">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>User Name</th>
                         <th>E-Mail</th>
                         <th>Password</th>
                         <th colspan="2" style="text-align:center">Actions</th>
                     </tr>
                </thead>
                <tbody>
                <!--10.show all users in this part of table ใช้วน loop ด้วยคำสั่ง while -->
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $cnt++; ?></td>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['user_email'];?></td>
                        <td><?php echo $row['user_passwd'];?></td>
                        <td><input type="button" value="แก้ไข" name="btn-edit" class="btn btn-primary" onclick = "update_user (<?php echo $row['user_id']; ?>);"></td>
                        <td><input type="button" value="ลบ" name="btn-delete" class="btn btn-danger" onclick ="delete_user (<?php echo $row['user_id']; ?>);"></td>
                    </tr>
                <?php } ?>
                </tbody>
             </table>
            </div>
            <!--12.display number of records -->
            <div><?php echo mysqli_num_rows($result) . " rocord(s) found."; ?></div>
        </div>
     </div>
 </div>
 <!--11.JavaScript for edit and delete actions -->
<script>
     //delete
     function delete_user(id) {
        if (confirm("Are you sure to delete this record?")) {
            window.location.href = "show_user.php?user_id=" + id;
        }
     }
     //update
     function update_user(id) {
         window.location.href = "update_user.php?user_id" + id;
     }
 </script>
 </body>
 </html>