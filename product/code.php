<?php
session_start();
require 'database/dbcon.php';

if(isset($_POST['delete_lor']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_lor']);
    $faculty_id = mysqli_real_escape_string($con, $_POST['delete_lor']);
   

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query = "DELETE FROM students WHERE id='$faculty_id' ";
    
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "lor Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "lor Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $studentemail = mysqli_real_escape_string($con, $_POST['studentemail']);
    $facultyemail = mysqli_real_escape_string($con, $_POST['facultyemail']);
    $enrollementnumber = mysqli_real_escape_string($con, $_POST['enrollementnumber']);
    $file = mysqli_real_escape_string($con, $_POST['file']);

    $query = "UPDATE students SET name='$name', studentemail='$studentemail', facultyemail='$facultyemail', enrollementnumber='$enrollementnumber', file='$file' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "lor Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "lor Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_lor']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $studentemail = mysqli_real_escape_string($con, $_POST['studentemail']);
    $facultyemail = mysqli_real_escape_string($con, $_POST['facultyemail']);
    $enrollementnumber = mysqli_real_escape_string($con, $_POST['enrollementnumber']);
    $file = mysqli_real_escape_string($con, $_POST['file']);

    $query = "INSERT INTO students (name,studentemail,studentemail,enrollementnumber,file) VALUES ('$name','$studentemail','$facultyemail', '$enrollementnumber','$file')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "lor Sended Successfully";
        header("Location: lor-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "lor Not Sended";
        header("Location: lor-create.php");
        exit(0);
    }
}

header('Location://localhost/purchase_data/product/add_product.php');


?>