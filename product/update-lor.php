<?php

session_start();
require 'database/dbcon.php';

// $product_id = $_GET['viewid'];
$name = mysqli_real_escape_string($con, $_POST['studentname']);
$studentemail = mysqli_real_escape_string($con, $_POST['studentemail']);
$facultyemail = mysqli_real_escape_string($con, $_POST['facultyemail']);
$enrollementnumber = mysqli_real_escape_string($con, $_POST['enrollementnumber']);
$file = mysqli_real_escape_string($con, $_POST['file']);
$course = mysqli_real_escape_string($con, $_POST['course']);

// $query = "UPDATE INTO students (studentname,studentemail,facultyemail,enrollementnumber,course,file) VALUES ('$name','$studentemail','$facultyemail', '$enrollementnumber','$course','$file') WHERE 'id' = $student_id";
$query = "UPDATE students SET (studentname,studentemail,facultyemail,enrollementnumber,course,file) VALUES ('$name','$studentemail','$facultyemail', '$enrollementnumber','$course','$file') WHERE 'id' = $student_id";
// $query = "INSERT INTO students (studentname,studentemail,facultyemail,enrollementnumber,course,file) VALUES ('$name','$studentemail','$facultyemail', '$enrollementnumber','$course','$file') WHERE 'id' = $student_id";

$query_run = mysqli_query($con, $query);
if ($query_run) {
    $_SESSION['message'] = "LOR Sended Successfully";
    header("Location: lor-list.php");
    exit(0);
} else {
    $_SESSION['message'] = "LOR Not Sended";
    header("Location: lor-list.php");
    exit(0);
}
