<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
}

if(isset($_GET['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   header('location:cart.php');
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'cart quantity updated';
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add to Cart - Dazivra Gems & Jewelry</title>
    <link rel="stylesheet" href="css/addtocart.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
  </head>
  <body>
    <!-- Navigation Bar -->
   <?php include 'components/user_header.php'; ?>


    <!-- Add to Cart Content -->
    <section class="cart-section">
      <div class="container">
        <h2>YOUR SHOPPING CART</h2>
        <br />
        <div class="cart-items">
   <?php
      $grand_total = 0;
      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart->execute([$user_id]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
   ?>
      <form action="" method="post" class="box">
      <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">

      
          <div class="cart-item">
            <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt=<?= $fetch_cart['image']; ?> />
            <div class="item-details">
              <h5><?= $fetch_cart['name']; ?></h5>
              <p>Price: LKR <?= $fetch_cart['price']; ?></p>
              <label for="quantity">Quantity:</label>
              <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_cart['quantity']; ?>">
         <button type="submit" class="fas fa-edit" name="update_qty">Update q</button>
            </div>
            <div class="item-total">
              <p>Total: LKR <?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></p>
                    <input type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="remove-item" name="delete">

                    
            </div>
          </div>
   </form>

   <?php
   $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>



        </div>

        <div class="cart-summary">
          <h4>Cart Summary</h4>
          <p>Total Price: LKR <?= $grand_total; ?></p>
                <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>

        </div>
      </div>
    </section>

    <!-- Footer Section -->
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
