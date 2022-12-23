<html>
<body>
<?php 
include('db_conn.php');
echo $_POST["email_inst"]; 
?> is registered successfully. 
<?php
header("create_inst_dte_user.html");
exit;
?>

</body>

</html>
