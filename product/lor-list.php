<?php
session_start();
require 'database\dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Student CRUD</title>
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

  <div class="container mt-4">

    <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>LOR Details
              <a href="..//buyer/index.php" class="btn btn-danger float-end">BACK</a>
              <!--<a href="lor-create.php" class="btn btn-primary float-end">Add LOr</a>-->
            </h4>
          </div>
          <div class="card-body">

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Student Email</th>
                  <th>Faculty Email</th>
                  <th>enrollement Number</th>
                  <th>Course</th>
                  <th>File</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM students";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $student) {
                ?>
                    <tr>
                      <td><?= $student['id']; ?></td>
                      <td><?= $student['studentname']; ?></td>
                      <td><?= $student['studentemail']; ?></td>
                      <td><?= $student['facultyemail']; ?></td>
                      <td><?= $student['enrollementnumber']; ?></td>
                      <td><?= $student['course']; ?></td>
                      <td><?= $student['file']; ?></td>
                      <td>
                        <a href="student_view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                        <a href="lor-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                        <form action="delete.php" method="POST" class="d-inline">
                          <button type="submit" name="delete_student" value="<?= $student['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "<h5> No Record Found </h5>";
                }
                ?>

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>