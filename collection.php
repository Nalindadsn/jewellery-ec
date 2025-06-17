<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
include 'components/wishlist_cart.php';


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Luxury Gems & Jewelry</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/collection.css" />
  </head>
  <body>
    <!-- Navigation Bar -->
  
         <?php include 'components/user_header.php'; ?>


    <br />
    <br />
    <h2 class="text-center">WELCOME TO SHOP COLLECTION</h2>

    <!-- Categories Section -->
    <section class="category container">
      <div class="row">


         <?php
           $select_categories = $conn->prepare("SELECT * FROM `categories` "); 
           $select_categories->execute();
           if($select_categories->rowCount() > 0){
            while($fetch_category = $select_categories->fetch(PDO::FETCH_ASSOC)){
         ?>

        <div class="col-md-4">
          <a href="#" class="text-decoration-none">
            <img
              src="uploaded_cat<?php echo "/".$fetch_category['file']; ?>"
              class="img-fluid rounded"
              alt="Category 1"
            />
            <h3><?= $fetch_category['name']; ?></h3>
          </a>
        </div>
         <?php
            }
         }else{
            echo '<p class="empty ">no categories added yet!</p>';
         }
         ?>

      </div>
    </section>

    <!-- Products Section -->
    <section class="container">
      <h2 class="text-center">PRODUCTS</h2>
      <br />
      <div class="row">


   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY id desc LIMIT 10"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
      <form action="" method="post" class="col-md-3">
 <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
        <div class="">
          <div class="card">
            <img
              src="uploaded_img/<?= $fetch_product['image_01']; ?>"
              class="card-img-top"
              alt="Product 1"
            />
            <div class="card-body">
              <h5 class="card-title"><?= $fetch_product['name']; ?></h5>
              <p class="card-text">LKR <?= $fetch_product['price']; ?>/-</p>
              <div class="row">   
                <div class="col-2">              
                  <input type="number" name="qty" class="qty border-0" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                </div>    
                <div class="col-10">
                    <input type="submit" value="add to cart" class="btn btn-primary option-btn border-0" name="add_to_cart">
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
   <?php
      }
   }else{
      echo '<p class="empty ">no products added yet!</p>';
   }
   ?>


      </div>
    </section>

    <br />

    <!-- Customized  -->
    <section class="Customized">
      <div class="container-2">
        <h2 class="text-center">TAILORED ELEGANCE: EXQUISITE CUSTOM JEWELRY</h2>
        <br />

        <div class="content-2">
          <div class="text-box-2">
            <p>
              Whether it’s an engagement ring, necklace, or bracelet, our
              skilled artisans craft one-of-a-kind pieces with premium
              materials, ensuring every design is personalized just for you.
            </p>
            <h3>Why Choose Us:</h3>
            <ul class="list">
              <li>Unique, tailored designs</li>
              <li>Premium craftsmanship</li>
              <li>Personalized service</li>
            </ul>
            <p class="cta">Contact Us Today to create your dream jewelry!</p>
            <div class="button-2">
              <a href="contactus.php" class="btn-1">Contact</a>
            </div>
          </div>
          <div class="image-box-1">
            <img src="images/custom 3.jpeg" alt="newarrivals" />
          </div>
        </div>
      </div>
    </section>

    <br />

    <footer>
      <div class="footer-container">
        <div class="social-icons">
          <a href="#">
            <img src="images/insta.jpg" alt="insta" class="insta"
          /></a>
          <a href="#"> <img src="images/fb.png" alt="fb" class="fb" /></a>
          <a href="#">
            <img src="images/tiktok2.png" alt="tiktok" class="tiktok"
          /></a>
          <a href="#">
            <img src="images/whatsapp.png" alt="whatsapp" class="whatsapp"
          /></a>
        </div>

        <div class="footer-links">
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="About.php">About Us</a></li>
            <li><a href="collection.php">Shop</a></li>
            <li><a href="contactus.php">Contact</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; 2024 Dazivra Gems & Jewelry | All Rights Reserved.</p>
      </div>
    </footer>
    
<script src="js/script.js"></script>

  </body>
</html>
