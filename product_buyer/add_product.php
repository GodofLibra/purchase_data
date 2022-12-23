<?php
//index.php
include('conn_db.php');

if(!isset($_SESSION["buyer_id"]))
{
    header("location:../buyer/login.php");
}

$abc = $_SESSION["buyer_id"];



$stmt = $connect->prepare("SELECT buyer_name FROM register_buyer WHERE buyer_id=:id");
$stmt->execute(['id' => $abc]); 
$user = $stmt->fetch();




?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Add Lor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});

</script>

    <style>

        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
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
      <div class="collapse navbar-collapse" id="navbarCollapse" >
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../buyer/index.php">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" href="add_product.php">Lor Items</a>
          </li>
        
         <form class="form-inline" action="../inst/logout.php" style=" margin-left: 51em;">
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
    <div class="wrapper" style=" margin-top: 2em;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left" class="mt-5">Available Lor Items</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "connect.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM products";
                    if($result = $con->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Category</th>";
                                        echo "<th>Image</th>";
                                        echo "<th>Count</th>";
                                        echo "<th>Amount</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['product_id'] . "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['product_description'] . "</td>";
                                        echo '<td id="price">'. $row['product_price'] .'</td>';
                                        echo "<td>" . $row['product_category'] . "</td>";
                                        echo "<td>" . $row['product_category'] . "</td>";
                                        echo "<td>";
                                           echo '
                                   <span class="input-group-btn">
                                       <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                         <span class="glyphicon glyphicon-minus"></span>
                                       </button>
                                   </span>
                                   <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                                   <span class="input-group-btn">
                                       <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                           <span class="glyphicon glyphicon-plus"></span>
                                       </button>
                                   </span>';
                                        echo "</td>";
                                        // echo "<td>" . $row['product_category'] . "</td>";
                                        echo '<td id="amount"></td>';
                                           
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    $con->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>


  
</div>


<script>
    var quantity = document.getElementById('quantity').value();
    var price = document.getElementById('price').innerHTML;
    var amount = parseInt(quantity) * parseInt(price);
    document.getElementById('amount').innerHTML = price;
</script>




</body>
</html>

