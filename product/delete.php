<?php
include 'connect_copy.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
}

$sql="delete from `students` where id=$id";
$result=mysqli_query($con,$sql);
if($result){
    header('location:lor-list.php');
}else{
    die(mysqli_error($con));
}
?>