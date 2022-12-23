<?php

include('conn_db.php');

$message = '';

if(isset($_GET['activation_code']))
{
	$query = "
		SELECT * FROM register_buyer
		WHERE buyer_activation_code = :buyer_activation_code
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':buyer_activation_code'			=>	$_GET['activation_code']
		)
	);
	$no_of_row = $statement->rowCount();
	
	if($no_of_row > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['buyer_email_status'] == 'not verified')
			{
				$update_query = "
				UPDATE register_buyer
				SET buyer_email_status = 'verified' 
				WHERE buyer_id = '".$row['buyer_id']."'
				";
				$statement = $connect->prepare($update_query);
				$statement->execute();
				$sub_result = $statement->fetchAll();
				if(isset($sub_result))
				{
					$message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="login.php">Login</a></label>';
				}
			}
			else
			{
				$message = '<label class="text-info">Your Email Address Already Verified</label>';
			}
		}
	}
	else
	{
		$message = '<label class="text-danger">Invalid Link</label>';
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Script with Email Verification</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div class="container">
			<h1 align="center">Login Script with Email Verification</h1>
		
			<h3><?php echo $message; ?></h3>
			
		</div>
	
	</body>
	
</html>