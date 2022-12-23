<?php
include 'connect.php';
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
</body>
<div class="container">
    <button class="btn btn-primary my-5">
        <a href="add_item.php" class="text-light">Add Lor Item</a></button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr. No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from `crud`";
            $result = mysqli_query($con, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $imageURL = 'uploads/'.$row["photo"];
                    $name = $row['name'];
                    $description = $row['description'];
                    $desc_str = substr($description,0,70);
                    
                    $price = $row['price'];
                    echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $name . '</td>
                    <td>' . $desc_str . '</td>
                    <td>' . $price . '</td>
                    <td>
                        <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                    </td>
                </tr>';
                }
            }
            ?>
        </tbody>
    </table>
   
</div>

</html>

<img style="height: 5em;" src="<?php echo $imageURL; ?>" alt="" />