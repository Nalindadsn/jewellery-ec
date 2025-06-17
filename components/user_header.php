<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
 <header>
      <div class="logo">Dazivra GemLuxury</div>
      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="collection.php">Collections</a></li>
          <li><a href="About.php">About Us</a></li>
          <li><a href="contactus.php">Contact</a></li>
          <li>
            <a href="cart.php"
              ><img src="images/addtocart.png" alt="Logo" class="addtocart"
            />
         
       <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?><?= $total_cart_counts; ?>
         </a>
          </li>
          
            <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
       <a href="update_user.php" class="btn"><?= $fetch_profile["name"]; ?> </a>
         <!-- <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div> -->
         <a href="components/user_logout.php" class="delete-btn btn btn-danger" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }else{
         ?>
         <!-- <p>please login or register first!</p> -->
         <div class="flex-btn">
            <a href="user_register.php" class="btn btn-primary option-btn">register</a>
            <a href="user_login.php" class="btn btn-primary option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>


        </ul>
      </nav>
    </header>
