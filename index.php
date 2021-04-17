<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
      <title>Exness Test Development
      </title>
      <!-- CSS -->
      <link rel="stylesheet" href="./style/style.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   </head>
   <body>
      <nav class="navbar navbar-expand-md navbar-light bg-light">
         <a class="navbar-brand" href="#">
         <img class="logo" src="logo.svg" alt="">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <!-- <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></li> -->
               <li class="nav-item">
                  <a class="nav-link" href="#">Cart
                  </a>
               </li>
            </ul>
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/login') }}">Login
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/register') }}">Register
                  </a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container">
         <div class="row">
            <?php
               $url = "https://fakestoreapi.com/products";
               //Getting the data from the url 
               $json = file_get_contents($url);
               //decode the json
               $json_data = json_decode($json);
               ?>
            <!--Looping through our encoded data -->
            <?php foreach ($json_data as $ourData) { ?>
            <div class="prod-body col-lg-3 col-6">
               <img src="<?php echo $ourData->image; ?>" class="prod-imgs" alt="">
               <p class="prod-category" id="prod-category"><?php echo $ourData->category; ?></p>
               <p class="prod-name" id="prod-name"><?php echo $ourData->title; ?></p>
               <a href="#" class="show_hide" data-content="toggle-text">Read Description</a>
               <p class="prod-desc" id="prod-desc"><?php echo $ourData->description; ?></p>
               <button class="add-to-cart <?php echo $ourData->id; ?>" id="modal-btn" data-toggle="modal" data-target="#myModal<?php echo $ourData->id ?>">
               Add to Cart
               </button>
               <p id="prod-price" hidden><?php echo $ourData->price; ?></p>
               <p id="prod-id" hidden><?php echo $ourData->id; ?></p>
            </div>
            <!--Creating our modal -->
            <div class="modal fade" id="myModal<?php echo $ourData->id; ?>" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button id="newt" type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                        <p>Added to the cart is:</p>
                        <div class="row" id="cart-items">
                           <div class="col-md-6">
                              <img class="modal-prod-img" id="product-img-modal" src="">
                           </div>
                           <div class="col-md-6 added-item">
                              <p class="modal-prod-name" id="<?php echo $ourData->title; ?>"></p>
                              <p class="modal-prod-price" id="<?php echo $ourData->id; ?>"></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
      <div class="footer col-12">
         <span class="copyright">All Rights Reserved @Company</span>
      </div>
      <!-- jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- bootstrap js -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <!-- js file -->
      <script src="js/script.js"></script>
   </body>
</html>