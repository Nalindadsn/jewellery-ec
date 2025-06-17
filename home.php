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
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/home.css" />
  </head>
  <body>
    <!-- Navigation Bar -->
     <?php include 'components/user_header.php'; ?>

    <!-- <header>
      <div class="logo">Dazivra GemLuxury</div>
      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="collection.php">Collections</a></li>
          <li><a href="About.php">About Us</a></li>
          <li><a href="contactus.php">Contact</a></li>
          <li>
            <a href="addtocart.php"
              ><img src="images/addtocart.png" alt="Logo" class="addtocart"
            /></a>
          </li>
        </ul>
      </nav>
    </header> -->

    <!-- Hero Section -->

    <section class="hero">
      <div class="container">
        <div class="content">
          <div class="image-box">
            <img src="images/bg.jpeg" alt="newarrivals" />
          </div>

          <div class="text-box-1">
            <h1>Timeless Elegance, Exquisite Craftsmanship</h1>
            <p>
              Discover the finest selection of gems & jewelry designed for
              sophistication
            </p>

            <div class="buttons">
              <a href="collection.php" class="btn"
                >Explore Collections</a
              >
              <a href="login.php" class="btn">Start</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Collections -->
    <section class="collections">
      <h2>Our Exclusive Collections</h2>
      <div class="collection-grid">



         <?php
           $select_categories = $conn->prepare("SELECT * FROM `categories` LIMIT 3"); 
           $select_categories->execute();
           if($select_categories->rowCount() > 0){
            while($fetch_category = $select_categories->fetch(PDO::FETCH_ASSOC)){
         ?>
         <div class="collection-item">
          <img src="uploaded_cat<?php echo "/".$fetch_category['file']; ?>" alt=" Ring" />
          <h3><?= $fetch_category['name']; ?></h3>
        </div>
 <?php
            }
         }else{
            echo '<p class="empty ">no categories added yet!</p>';
         }
         ?>

        
       
      </div>
    </section>

    <!-- New Arrivals -->
    <section class="newarrivals">
      <div class="container">
        <div class="content">
          <div class="text-box">
            <h2>New Arrivals</h2>
            <p>
              With over 20 years of expertise, we craft stunning jewelry pieces
              that celebrate beauty, love, and elegance.
            </p>

            <div class="buttons">
              <a href="new-arival.php" class="btn">New Arrival</a>
            </div>
          </div>
          <div class="image-box">
            <img src="images/image 2.jpeg" alt="newarrivals" />
          </div>
        </div>
      </div>
    </section>

    <!-- New Arrivals
     
    <section class="Customized">
        <div class="container-1">
            <div class="content-1">
                <div class="text-box-1">
                    <h2> CUSTOMIZED JEWELRY</h2>
                    <p>Whether it’s an engagement ring, necklace, or bracelet, our skilled artisans craft
                        one-of-a-kind pieces with premium materials, ensuring every design is personalized just for you.</p>
    
        <div class="buttons">
            <a href="contactus.php" class="btn">Contact</a>
            
        </div>

                </div>
                <div class="image-box-1">
                    <img src="images/image 2.jpeg" alt="newarrivals">
                </div>
            </div>
        </div>
    </section>

    -->

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
  </body>
</html>
