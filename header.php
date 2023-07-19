<?php

if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<header class="header">

   <div class="flex">

      <a href="home.php" class="logo"><img src="images/logo/logo.png" max-width=100% hight="auto" width="80px" alt="">Life <span>of</span> Green</a>

      <nav class="navbar" id="nav">
         <a href="home.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "home.php") {
                                       echo "active";
                                    } ?>">Home</a>
         <a href="shop.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "shop.php") {
                                       echo "active";
                                    } ?>">Shop</a>
         <a href="service.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "service.php") {
                                          echo "active";
                                       } ?>">Service</a>
         <a href="blog.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "blog.php") {
                                       echo "active";
                                    } ?>">Blog</a>
         <a href="contact.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "contact.php") {
                                          echo "active";
                                       } ?>">Contact</a>
      </nav>

      <!-- <button >hello</button> -->

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <a href="search_page.php" class="fas fa-search"></a>
         <?php
         $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $count_cart_items->execute([$user_id]);
         $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
         $count_wishlist_items->execute([$user_id]);
         ?>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $count_wishlist_items->rowCount(); ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
      </div>

      <div class="profile">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$user_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="user_profile_update.php" class="btn">update profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

      <!-- message button -->
      <div id="message-btn" class="fa-solid fa-message" style=" display:<?php if ($fetch_profile['user_status'] == 'not subscriber') {
                                                                           echo 'none';
                                                                        } else {
                                                                           echo 'block';
                                                                        }; ?>"></div>

      <div class="message-container">
         <div class="advisor_list">
            <p class="container-title"><i class="fa-solid fa-message"></i> Message <i class="fas fa-times" id="message-minimize"></i></p>
            <div class="advisorList">

            </div>

         </div>
      </div>

   </div>
</header>