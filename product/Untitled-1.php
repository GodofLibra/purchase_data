<?php

session_start();
require 'database/dbcon.php';

    $query = "Select * from register_buyer;

    $query_run = mysqli_query($con, $query);
    echo $query_run; exit();

    $sql = "SELECT * FROM register_buyer";
    $result = $connect->query($sql);
 ?>
<?php

session_start();
require 'database/dbcon.php';

     $sql = "SELECT * FROM register_buyer";
    $result = $connect->query($sql);
?>