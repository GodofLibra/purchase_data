<?php

session_start();
require 'database/dbcon.php';

// echo "<pre>"; print_r($_POST); exit();
    $name = mysqli_real_escape_string($con, $_POST['studentname']);
    $studentemail = mysqli_real_escape_string($con, $_POST['studentemail']);
    $facultyemail = mysqli_real_escape_string($con, $_POST['facultyemail']);
    $enrollementnumber = mysqli_real_escape_string($con, $_POST['enrollementnumber']);
    $file = mysqli_real_escape_string($con, $_POST['file']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO students (studentname,studentemail,facultyemail,enrollementnumber,course,file) VALUES ('$name','$studentemail','$facultyemail', '$enrollementnumber','$course','$file')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "LOR Sended Successfully";
        header("Location: add_product.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "LOR Not Sended";
        header("Location: add_product.php");
        exit(0);
    }

header('Location://localhost/purchase_data/product/add_product.php');

 ?>