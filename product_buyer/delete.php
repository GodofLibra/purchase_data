<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
}

$sql="delete from `products` where product_id=$id";
$result=mysqli_query($con,$sql);
if($result){
    header('location:add_product.php');
}else{
    die(mysqli_error($con));
}
?>