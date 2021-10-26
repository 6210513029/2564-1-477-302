<?php
    //1.connect to mysql database  ใช้กำหนดตั้งค่าของฐานข้อมูล username passwd ที่ต่อกับ mysql และชื่อของฐานข้อมูล
    //host, db_username, db_password,  db_name
    $host = "localhost";
    $db_username = "root";
    $db_password = ""; 
    $db_name = "project_db"; //ตัวแปร 4 ตัวที่ใช้เชื่อมต่อกับ mysql

    //เชื่อมต่อฐานข้อมูล
    $con = mysqli_connect($host, $db_username, $db_password, $db_name)
    or die("Error " . mysqli_error($con));
?>