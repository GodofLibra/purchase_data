<?php
// session_start();
require '../buyer/conn_db.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "purchase_data";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM register_buyer";
$result = $conn->query($sql);


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Lor Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>LOR Add 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="save_lor.php" method="POST">

                            <div class="mb-3">
                                <label>Student Name</label>
                                <input type="text" name="studentname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Student Email</label>
                                <input type="email" name="studentemail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Faculty Email</label>
                            
                            <select name="facultyemail">
                                <?php
                                    while($row = $result->fetch_assoc()):;
                                ?>
                                    <option value="<?php echo $row["buyer_email"];
                                    ?>">
                                        <?php echo $row["buyer_email"];
                                        ?>
                                    </option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label>Student Enrollement Number</label>
                                <input type="text" name="enrollementnumber" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Student Course</label>
                                <input type="text" name="course" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="formFile" name="file" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student Lor</button>
                            </div>

                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



