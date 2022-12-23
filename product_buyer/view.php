<?php
include 'connect.php';
$product_id = $_GET['viewid'];
$sql = "Select * from `products` where product_id=$product_id ";
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
        <form method="post" class="row g-3" enctype="multipart/form-data" action="add_product.php">
            <select name="category"class="form-select" aria-label="Disabled select example" style="width: 30em;" disabled>
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

            

            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea type="text"  name="description" class="form-control" id="inputDescription" autocomplete="off" required><?php echo htmlspecialchars($description); ?></textarea>
            </div>

            <div class="col-md-2">
                <label class="form-label">Price</label>
                <input type="number" name="price" value="<?php echo $price; ?>" class="form-control" id="inputPrice" autocomplete="off" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Lor</button>
            </div>
        </form>
    </div>

</body>

</html>