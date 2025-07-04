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

<header class="header">

   <section class="flex">

      <a href="../admin/home.php" class="logo">Dashboard</a>

      <nav class="navbar">
         <a href="../admin/home.php">HOME</a>
         <a href="../admin/products.php">PRODUCTS</a>
         <a href="../admin/categories.php">CATEGORIES</a>
         <a href="../admin/placed_orders.php">ORDERS</a>
         <a href="../admin/admin_accounts.php">ADMINS </a>
         <a href="../admin/users_accounts.php">USERS</a>
         <a href="../admin/messages.php">MESSAGES</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="../admin/update_profile.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="../admin/register_admin.php" class="option-btn">register</a>
            <a href="../admin/admin_login.php" class="option-btn">login</a>
         </div>
         <a href="../components/admin_logout.php" class="delete-btn ml-2" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>