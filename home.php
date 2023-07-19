<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

if (isset($_POST['add_to_wishlist'])) {

   $pid     = $_POST['pid'];
   $pid     = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name  = $_POST['p_name'];
   $p_name  = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if ($check_wishlist_numbers->rowCount() > 0) {
      $message[] = 'already added to wishlist!';
   } elseif ($check_cart_numbers->rowCount() > 0) {
      $message[] = 'already added to cart!';
   } else {
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }
}

if (isset($_POST['add_to_cart'])) {

   $pid     = $_POST['pid'];
   $pid     = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name  = $_POST['p_name'];
   $p_name  = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty   = $_POST['p_qty'];
   $p_qty   = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if ($check_cart_numbers->rowCount() > 0) {
      $message[] = 'already added to cart!';
   } else {

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if ($check_wishlist_numbers->rowCount() > 0) {
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Life of Green</title>
   <!-- favicon link -->
   <link rel="shortcut icon" href="images/logo/logo.png" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>

<body>

   <?php include 'header.php'; ?>

   <!-- slider section starts -->

   <div class="home-bg">

      <section class="home" id="home">

         <div class="swiper-container home-slider">

            <div class="swiper-wrapper">

               <div class="swiper-slide">
                  <div class="box" style="background: url(images/slider/slider1.jpg);">
                     <div class="content">
                        <span>Upto 75% off</span>
                        <h3>Plant big sale special offer</h3>
                        <a href="shop.php" class="btn">shop now</a>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide">
                  <div class="box" style="background: url(images/slider/slider2.jpg);">
                     <div class="content">
                        <span>Upto 45% off</span>
                        <h3>Plant make people happy</h3>
                        <a href="shop.php" class="btn">shop now</a>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide">
                  <div class="box" style="background: url(images/slider/slider3.jpg);">
                     <div class="content">
                        <span>Upto 65% off</span>
                        <h3>Decorate your home now</h3>
                        <a href="shop.php" class="btn">shop now</a>
                     </div>
                  </div>
               </div>

            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

         </div>

      </section>

   </div>

   <!-- slider section End -->

   <!-- banner section starts  -->

   <section class="banner-container">

      <div class="banner">
         <img src="images/bg/banner1.jpg" alt="">
         <div class="content">
            <span>Big Sale Product</span>
            <h3>Plants <br> For Interior</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>
      <div class="banner">
         <img src="images/bg/banner2.jpg" alt="">
         <div class="content">
            <span>Top Product</span>
            <h3>Plants <br> For Healthy</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

   </section>

   <!-- banner section ends -->

   <!-- category section start -->

   <section class="categories" id="categories">

      <h1 class="title">shop by category</h1>

      <div class="swiper categories-slider">
         <div class="swiper-wrapper box-container">

            <div class="swiper-slide box">
               <img src="images/cg/cat1.jpg" alt="">
               <h3>Bonsai</h3>
               <p>upto 45% off</p>
               <a href="category.php?category=bonsai" class="btn">shop now</a>
            </div>

            <div class="swiper-slide box">
               <img src="images/cg/cat2.jpg" alt="">
               <h3>Flower Plant</h3>
               <p>upto 45% off</p>
               <a href="category.php?category=flower" class="btn">shop now</a>
            </div>

            <div class="swiper-slide box">
               <img src="images/cg/cat3.jpg" alt="">
               <h3>Fruit plant</h3>
               <p>upto 45% off</p>
               <a href="category.php?category=fruit" class="btn">shop now</a>
            </div>

            <div class="swiper-slide box">
               <img src="images/cg/cat4.jpg" alt="">
               <h3>Seeds</h3>
               <p>upto 45% off</p>
               <a href="category.php?category=seed" class="btn">shop now</a>
            </div>

            <div class="swiper-slide box">
               <img src="images/cg/cat5.jpg" alt="">
               <h3>Garden Accessories</h3>
               <p>upto 45% off</p>
               <a href="category.php?category=accessories" class="btn">shop now</a>
            </div>

         </div>
      </div>

   </section>

   <!-- category section end -->


   <!-- product section start -->

   <section class="product">

      <div style="text-align: center;">
         <h2 class="title-line">Daily Deals!</h2>
      </div>

      <div class="box-containers">

         <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <form action="" class="box" method="POST">
                  <span class="discount">-10%</span>
                  <div class="icons">
                     <button type="submit" name="add_to_wishlist" value="" class="fas fa-heart"></button>
                     <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                  </div>
                  <a href="view_page.php?pid=<?= $fetch_products['id']; ?>">
                     <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                  </a>
                  <div class="name"><?= $fetch_products['name']; ?></div>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="far fa-star"></i>
                  </div>
                  <div class="quantity">
                     <span> Quantity : </span>
                     <input type="number" min="1" max="100" value="1" name="p_qty" class="qty">
                  </div>
                  <div class="price">৳ <span><?= $fetch_products['price']; ?></span></div>
                  <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                  <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
                  <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
                  <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
                  <input type="submit" value="add to cart" class="btn" name="add_to_cart">
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>

      </div>

   </section>

   <!-- product section end -->

   <!-- Service section start -->
   <Section class="service">
      <div class="service-content">
         <div class="box" style="background: url(images/bg/banner3.jpg);">
            <div class="content">
               <h2>Get Services</h2>
               <h3>Plant Diseases? <br>Get Help From Us.</h3>
               <a href="service.php" class="btn">go now</a>
            </div>
         </div>
      </div>
   </Section>

   <!-- service section end -->



   <?php include 'footer.php'; ?>

   <!-- scroll top button  -->
   <a href="#home" class="scroll-top fas fa-angle-up"></a>

   <!-- js source link -->

   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

   <script src="js/script.js"></script>
   <script src="js/home_page.js"></script>

</body>

</html>