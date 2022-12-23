<?php
// session_start();
include('conn_db.php');
require '../buyer/conn_db.php';
// 
if (!isset($_SESSION["inst_user_id"])) {
  header("location:login.php");
}
// 
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

  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          <?php echo $user1 = end($user); ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../product/add_product.php">LOR</a>
            </li>

            <form class="form-inline" action="logout.php" style=" margin-left: 53.5em;">
              <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          </ul>
          <!--<form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>-->
        </div>
      </div>
    </nav>
  </header>

  <div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>LOR Add

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
                  while ($row = $result->fetch_assoc()) :;
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
                <button type="submit" name="save_student" class="btn btn-primary">Send Lor</button>
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