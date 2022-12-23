<?php
include 'connect.php';
$product_id = $_GET['updateid'];
$sql = "Select * from `products` where product_id=$product_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$photo = $row['product_img_name'];
$name = $row['product_name'];
$description = $row['product_description'];
$price = $row['product_price'];
$category = $row['product_category'];
$imgurl = 'uploads/'.$row["product_img_name"];

switch ($category) {
  case "Physics":
    $abc="Physics";
    break;
  case "Computer/IT":
    $abc="Computer/IT";
    break;
  case "Mechanical":
    $abc="Mechanical";
    break;
   case "Automobile":
    $abc="Automobile";
    break;  
   case "Eletrical":
    $abc="Eletrical";
    break;
   case "Civil":
    $abc="Civil";
    break;
  default:
    #adsa
    break;
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $photo = $_POST['photo'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $product_category = $abc;#$_POST['category'];
    


    $targetDir = "uploads/";
    $fileName = basename($_FILES["photo"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');


    if($photo == ""){

        $sql = "update `products` set product_id=$product_id,product_name='$name',product_description='$description',product_price='$price', product_category='$product_category' where product_id=$product_id";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    header('location:add_product.php');
                } else {
                    die(mysqli_error($con));
                }

    }
    else{
    if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $sql = "update `products` set product_id=$product_id,product_img_name='$fileName',product_name='$name',product_description='$description',product_price='$price', product_category='$product_category' where product_id=$product_id";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    header('location:add_product.php');
                } else {
                    die(mysqli_error($con));
                }
        }
    }
}
};

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
            <select name="category"class="form-select" aria-label="Default select example" style="width: 30em;" >
            <option selected value=""><?php echo $category; ?></option>
            <option value="Physics">Marin</option>
            <option value="Computer/IT">Computer/IT</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Automobile">Automobile</option>
            <option value="Electrical">Electrical</option>
            <option value="Civil">Civil</option>
            </select>
            <div class="col-md-8">
                <label class="form-label">Item Name</label>
                <input type="text" value="<?php echo $name; ?>" name="name" class="form-control" id="inputName" autocomplete="off" required>
            </div>

            <label class="form-label">Current Image</label><span><?php echo $photo ?></span>
            <img style="height: 300px; width:300px;" src="<?php echo $imgurl; ?>" alt=""><br><br>

            <div class="col-md-12">

                <label class="form-label">Select Image File to Upload:</label><br />
                <input type="file"  name="photo" class="form-control" id="inputPhoto" autocomplete="off">

            </div>

            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea type="text"  name="description" class="form-control" id="inputDescription" autocomplete="off" required><?php echo htmlspecialchars($description); ?></textarea>
            </div>

            <div class="col-md-2">
                <label class="form-label">Price</label>
                <input type="number" name="price" value="<?php echo $price; ?>" class="form-control" id="inputPrice" autocomplete="off" required>
            </div>

            

            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Update  </button>
            </div>
        </form>
    </div>

</body>

</html>