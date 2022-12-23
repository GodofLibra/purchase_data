<?php

include('conn_db.php');

if(!isset($_SESSION["inst_user_id"]))
{
    header("location:login.php");
}

$abc = $_SESSION["inst_user_id"];



$stmt = $connect->prepare("SELECT inst_name FROM register_inst WHERE inst_user_id=:id");
$stmt->execute(['id' => $abc]); 
$user = $stmt->fetch();

echo $user1 = end($user);

include 'connect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    if ($name != null && $description != null && $price != null) {

        //File upload path
        $targetDir = "uploads/";
        $fileName = basename($_FILES["photo"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $sql = "insert into `products` (product_img_name,product_name,product_description,product_price,product_category,seller_id) values('" . $fileName . "', '$name', '$description', '$price','$category','$abc')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    header('location:add_product.php');
                } else {
                    die(mysqli_error($con));
                }
            }
        }
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post" class="row g-3" enctype="multipart/form-data">
            <select name="category"class="form-select" aria-label="Default select example" style="width: 30em;">
            <option selected value="">Select Category</option>
            <option value="Physics">Marin</option>
            <option value="Computer/IT">Computer/IT</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Automobile">Automobile</option>
            <option value="Electrical">Electrical</option>
            <option value="Civil">Civil</option>
            </select>
            <div class="col-md-8">
                <label class="form-label">Item Name</label>
                <input type="text" name="name" class="form-control" id="inputName" autocomplete="off" required>
            </div>

            <div class="col-md-8">
                <label class="form-label">Select Image File to Upload:</label><br />
                <input type="file" name="photo" class="form-control" id="inputPhoto" autocomplete="off" required>
            </div>

            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="inputDescription" autocomplete="off" required></textarea>
            </div>

            <div class="col-md-2">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="inputPrice" autocomplete="off" required>
            </div>

            

            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>