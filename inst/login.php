<?php
//login.php

include('conn_db.php');

if (isset($_SESSION['inst_user_id'])) {
	header("location:index.php");
}

$message = '';
if (isset($_POST["login"])) {

	$query = "
	SELECT * FROM register_inst 
		WHERE inst_email = :inst_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			'inst_email'	=>	$_POST["inst_email"]
		)
	);
	$count = $statement->rowCount();
	if ($count > 0) {
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			if ($row['inst_email_status'] == 'verified') {
				if (password_verify($_POST["inst_password"], $row["inst_password"]))
				//if($row["user_password"] == $_POST["user_password"])
				{
					$_SESSION['inst_user_id'] = $row['inst_user_id'];
					header("location:index.php");
				} else {
					$message = "<label>Wrong Password</label>";
				}
			} else {
				$message = "<label class='text-danger'>Please First Verify, your email address</label>";
			}
		}
	} else {
		$message = "<label class='text-danger'>Wrong Email Address</label>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Student Login System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<br />
	<div class="container" style="width:100%; max-width:600px">
		<h2 align="center">Student Login System</h2>
		<br />
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Login</h4>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">


					<?php echo $message; ?>
					<div class="form-group">
						<label>User Email</label>
						<input type="email" name="inst_email" class="form-control" required />
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="inst_password" class="form-control" required />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-info" />
					</div>
					<a href="../admin.php">Home Page</a>

				</form>

			</div>
		</div>
	</div>
</body>

</html>