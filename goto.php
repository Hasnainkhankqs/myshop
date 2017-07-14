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
    <style>

.figure{
    padding-top:10px;
}
.figure img{
    height:80%;
}
.figure a {
    margin-top:50px;
}
.details{
    
    margin-top:50px;
}
.details .row{
    border-top:1px solid gray;
}
.below{
    margin-top:50px;
}
.cartfun{
    background:lightslategray;
}
.cart_img{
    width:50%;
    border:1px solid lightslategray;
    margin:10px;    
    
}
.strip{
    background-color:#80cac5;
    border-bottom:1px dotted black;
}
.margin-top{
    margin-top:30px;
}
</style>
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
<div class="row cartfun">
<div class='col-md-12 text-right'>
<h5>Welcome Guest ! Shoping cart - item <?php itemsum() ?>- price : $ .<?php totalprice() ;?>-- <a href='goto.php'>Goto</a></h5>
</div> 
</div>
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
            <div class="col-md-3">
              <span>Remove</span>
            </div>
            <div class="col-md-3">
               <span>Item(s)</span>
            </div>
            <div class="col-md-3">
               <span>Quantity</span>
            </div>
            <div class="col-md-3">
               <span>Total Price</span>
            </div>
        </div>
        <?php 
        $ip_address_demo = 1;
        $total = 0;
         $query = "select * from cart where ip_addrs = '$ip_address_demo'";
         $run = mysqli_query($conn,$query);
         while($result = mysqli_fetch_array($run)){
            $product_id =  $result['p_id'] ;                
             $query2 = "select * from products where product_id = '$product_id'";
             $run2 = mysqli_query($conn,$query2);
              while($result2 = mysqli_fetch_array($run2)){
               $product_price =  $result2['product_price'] ;
                $total += $product_price;  
               $product_img1 =  $result2['product_img1'] ;            
        ?>
        <div class="row strip">
            <div class="col-md-3">
                <input type="checkbox" class="form-control margin-top">
            </div>
            <div class="col-md-3">
               <img src="admin_area/product_images/<?php echo $product_img1 ?>" class='img-fluid cart_img img-thumbnail margin-top' alt="">
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control margin-top">
            </div>
            <div class="col-md-3">
               <span class='margin-top'><?php echo '$' . $product_price ?></span>
            </div>
        </div>
        <?php 
         }
         }
         ?>
         <div class="row">
            <div class="col-md-3">
              <span><a href="#">Update Cart</a></span>
            </div>
            <div class="col-md-3">
               <span><a href="#">Continue Shoping</a></span>
            </div>
            <div class="col-md-3">
               <span><a href="checkout.php">Check Out</a></span>
            </div>
            <div class="col-md-3">
               <span>Total Price:<?php echo "$ ".$total  ?> </span>
            </div>
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
