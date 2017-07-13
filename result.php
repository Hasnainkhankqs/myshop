<?php 

include('includes/db.php');
include('function/function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6/tether-1.3.3/dist/css/tether.min.css">
    <link rel="stylesheet" href="styles/style.css">

    <title>My Shop</title>
</head>

<body>

    <div class="container-fluid">

        <header class="text-center">
            <div class="col-md-1 col-sm-1">
                <img src="images/img1.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-4 col-sm-4">
                <img src="images/img2.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-3 col-sm-3">
                <img src="images/img3.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-3 col-sm-3">
                <img src="images/img4.gif" alt="" class="img-fluid">
            </div>
        </header>
        <nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">All Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sopping Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method='get' action='result.php' enctype='multipart/form-data'>
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name='user_query'>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='search'>Search</button>
    </form>
  </div>
</nav>
<div class="row">
    
        <aside class="col-md-3">
        <div class'row'>
            <div class="col-md-12 text-center" >
                
            <h1>Categories</h1>
            <ul class='paddingMarginOff' style='list-style:none'>
                <?php 
                catList();                
                ?>
            </ul>
           
        </div>
        </div>
        <div class'row'>
            <div class="col-md-12 text-center" >
            <h1>Brands</h1>
            <ul class='paddingMarginOff' style='list-style:none'>
                <?php 
                brandlist();
                ?>
                
            </ul>
        </div>
        </div>
         </aside>
  
    <div class="col-md-9 paddingMarginOff">
        <div class="row">
            <article class="col-md-12 text-center paddingMarginOff">
                <div class="row">
                    <?php 
                  
    if(isset($_GET['search'])){
    $user_query = $_GET["user_query"];
    $displayProduct = "SELECT * FROM `products` where product_key like '%$user_query%'";
    $run = mysqli_query($conn,$displayProduct);
    $count = mysqli_num_rows($run);
    
    if($count == 0){
    echo "<h3>For this keyword Product Not Available right now !!!</h3>";
    }                       
        else{
                            while($row = mysqli_fetch_array($run)){
                                $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_img1 = $row['product_img1'];
                                $product_price = $row['product_price'];
                            echo "<div class='col-md-3 product_thumbnail'>
                        <figure class='figure'>
                            <figcaption class='figure-caption'> $product_title </figcaption>
                                <img src='admin_area/product_images/$product_img1' class='figure-img img-fluid  img-thumbnail' alt='A generic square placeholder image with rounded corners in a figure.'>
                                <div>Price:<span>$ $product_price</span></div>
                                <div>
                                    <a href='detail.php?detail=$product_id' class='btn btn-primary btn-sm' >detail</a>
                                    <a href='index.php?cart=$product_id' class='btn btn-success btn-sm' >Add Card</a>
                                </div>
                        </figure>
                    </div>";
                        }
                }
            }


                    ?>
                    
                </div>
            </article>
        </div>
    </div>
</div>
<div class="row">
    
</div>
<footer class="text-center" style="background-color:lightslategray;">
   
        This is made by Hasnain Khan kqs
   
</footer>
    </div>


    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap-4.0.0-alpha.6/dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.0.0-alpha.6/tether-1.3.3/dist/js/tether.min.js></script>

</body>

</html>
