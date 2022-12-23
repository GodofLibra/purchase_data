<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('conn_db.php');
$message = '';


if(isset($_POST["reg_inst"]))
{
  $query = "
  SELECT * FROM register_inst 
  WHERE inst_email = :inst_email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
      ':inst_email' =>  $_POST['inst_email']
    )
  );
  $no_of_row = $statement->rowCount();
  if($no_of_row > 0)
  {
    $message = '<label class="text-danger">Email Already Exits</label>';
  }
  else
  {
    $inst_password = rand(100000,999999);
    $inst_encrypted_password = password_hash($inst_password, PASSWORD_DEFAULT);
    $inst_activation_code = md5(rand());
    $insert_query = "
    INSERT INTO register_inst 
    (inst_name, inst_email, inst_password, inst_activation_code, inst_email_status) 
    VALUES (:inst_name, :inst_email, :inst_password, :inst_activation_code, :inst_email_status)
    ";
    $statement = $connect->prepare($insert_query);
    $statement->execute(
      array(
        ':inst_name'      =>  $_POST['inst_name'],
        ':inst_email'     =>  $_POST['inst_email'],
        ':inst_password'    =>  $inst_encrypted_password,
        ':inst_activation_code' =>  $inst_activation_code,
        ':inst_email_status'  =>  'not verified'
      )
    );
    $result = $statement->fetchAll();
    if(isset($result))
    {
      $base_url = "http:/localhost/purchase_data/inst/";
      
      $mail_body = "
      <p>Hi ".$_POST['inst_name'].",</p>
      <p>Thanks for Registration. Your password is ".$inst_password.", This password will work only after your email verification.</p>
      <p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$inst_activation_code."
      <p>Best Regards,<br />DTE</p>
      ";
      

      require 'src/Exception.php';
      require 'src/PHPMailer.php';
      require 'src/SMTP.php';
      //require 'PHPMailer-master/PHPMailerAutoload.php';
      $mail = new PHPMailer(true);

      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP(); 
      
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rushabh.amin1990@gmail.com';                     //SMTP username
        $mail->Password   = 'mhliesxhsjvwkgkv';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;   

      
      $mail->From = 'rushabh.amin1990@gmail.com';   //Sets the From email address for the message
      $mail->FromName = 'Requirement Website Admin';          //Sets the From name of the message
      $mail->AddAddress($_POST['inst_email'], $_POST['inst_name']);   //Adds a "To" address     
      $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
      $mail->IsHTML(true);              //Sets message type to HTML       
      $mail->Subject = 'Email Verification';      //Sets the Subject of the message
      $mail->Body = $mail_body;             //An HTML or plain text message body
      if($mail->Send())               //Send an Email. Return true on success or false on error
      {
        $message = '<label class="text-success">Register Done, Please check your mail.</label>';
      }
    }
  }
}

?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Admin Panel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">

    

    

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
      <img src="assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
       Recommendation Latter System
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../admin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="create_inst_user.php">Register Student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../buyer/create_inst_user.php">Register faculty</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="../restrict_access.php">Restrict Access</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <!--<form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>-->
        <form action="login.php">
        <button type="submit" class="btn btn-primary">Student</button>
        </form>
        <form action="../buyer/login.php">
        <button type="submit" class="btn btn-warning">faculty</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h3 class="mt-5">Student Registration</h3>
    
    <form id="register_form" method="post">
  <div class="mb-3">
     <label for="exampleInputInstitueName1" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="exampleInputInstitueName1" aria-describedby="InstituteNameHelp" name="inst_name" required placeholder="Ganpat University">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="inst_email" required placeholder="abc@ganpatuniversity.ac.in">
   
    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
    
  </div>
  <button type="submit" class="btn btn-primary" name="reg_inst" id="reg_inst">Create</button>
  <?php echo $message; ?>
</form>
  </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted" style=" text-align: center; display: inline-block; width: 100%;" >Made with <svg viewBox="0 0 1792 1792" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" style="height: 0.8rem;"><path d="M896 1664q-26 0-44-18l-624-602q-10-8-27.5-26T145 952.5 77 855 23.5 734 0 596q0-220 127-344t351-124q62 0 126.5 21.5t120 58T820 276t76 68q36-36 76-68t95.5-68.5 120-58T1314 128q224 0 351 124t127 344q0 221-229 450l-623 600q-18 18-44 18z" fill="#e25555"></path></svg>.</span>
  </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
