<?php
include 'connect_copy.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
}

$sql = "DELETE FROM students WHERE id=$id";
$result = mysqli_query($con, $sql);
if ($result) {
    header('location:lor-list.php');
} else {
    die(mysqli_error($con));
}
