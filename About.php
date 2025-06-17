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
    <title>About Us - Dazivra Gem & Jewelry</title>

    <link rel="stylesheet" href="css/about.css" />
    <link rel="stylesheet" href="css/nav.css" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
  </head>
  <body>
    <!-- Navigation Bar -->
 <?php include 'components/user_header.php'; ?>


    <!-- About Content -->

    <section class="about-section">
      <div class="container">
        <div class="row">
          <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
            <div class="inner-column">
              <div class="sec-title">
                <span class="title">About Company</span>
                <h2>
                  Discover Timeless Elegance and Craftsmanship at Dazivra Gems &
                  Jewelry
                </h2>
              </div>
              <div class="text">
                At Dazivra Gems & Jewelry, we blend elegance and craftsmanship
                to offer exquisite, ethically sourced gemstones and fine
                jewelry. Our skilled artisans create each piece with precision,
                ensuring unmatched quality and timeless beauty. Committed to
                sustainability, we use only ethically mined gemstones, promising
                luxury and authenticity in every creation.
              </div>
              <ul class="list-style-one">
                <li>
                  Each gemstone is hand-selected for its brilliance and purity.
                </li>
                <li>
                  Our skilled artisans create masterpieces with precision and
                  passion.
                </li>
                <li>
                  We adhere to responsible mining and fair trade practices.
                </li>
              </ul>
              <div class="btn-box">
                <a href="contactus.php" class="theme-btn btn-style-one"
                  >Contact Us</a
                >
              </div>
            </div>
          </div>

          <!-- Image Column -->
          <div class="image-column col-lg-6 col-md-12 col-sm-12">
            <div class="inner-column wow fadeInLeft">
              <figure class="image-1">
                <a href="#" class="lightbox-image" data-fancybox="images">
                  <img src="images/bg im 2.jpeg" alt=""
                /></a>
              </figure>
              <figure class="image-2">
                <a href="#" class="lightbox-image" data-fancybox="images">
                  <img src="images/bg im 3.jpeg" alt=""
                /></a>
              </figure>
            </div>
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
  </body>
</html>
