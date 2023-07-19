<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

if (isset($_POST['add_to_wishlist'])) {

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
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

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

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
   <title>shop</title>
   <!-- favicon link -->
   <link rel="shortcut icon" href="images/logo/logo.png" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <section class="wrapper-shop">

      <div class="sidebar">

         <div class="p-category">
            <h2>Product Categories</h2>
            <ul>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category.php?category=bonsai">Bonsai</a>
               </li>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category.php?category=flower">Flower Plant</a>
               </li>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category.php?category=fruit">Fruit Plant</a>
               </li>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category.php?category=seed">Seeds</a>
               </li>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category.php?category=accessories">Garden Accessories</a>
               </li>
            </ul>
         </div>

         <div class="p-category season">
            <h2>Seasonal Product</h2>
            <ul>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category_seasonal.php?seasonal=all_season_flower">All Season Flower Plant</a>
               </li>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category_seasonal.php?seasonal=all_season_fruit">All Season Fruit Plant</a>
               </li>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category_seasonal.php?seasonal=winter_season">Winter Season Plant</a>
               </li>
               <li>
                  <i class="fa-solid fa-folder"></i>
                  <a href="category_seasonal.php?seasonal=other">Others</a>
               </li>
            </ul>
         </div>
      </div>

      <div class="product product-shop" id="product">

         <h1 class="title">latest products</h1>

         <div class="box-containers">

            <?php
            $limit = 6;
            if(isset($_GET['page'])){
               $page_number = $_GET['page'];
            }
            else{
               $page_number = 1;
            }
            $offset = ($page_number -1) * $limit;
            $select_products = $conn->prepare("SELECT * FROM `products` LIMIT {$offset}, {$limit}");
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

            <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount();
            $total_page = ceil($number_of_products / $limit);
            echo "<ul class='pagination shop-pagination'>";

            if ($page_number >= 1) {
               echo '<li><a href="shop.php?page=' . ($page_number - 1) . '"><i class="fa-solid fa-chevron-left"></i></a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {
               if ($i == $page_number) {
                  $active = "active";
               } else {
                  $active = "";
               }
               echo '<li class=' . $active . '><a href="shop.php?page=' . $i . '">' . $i . '</a></li>';
            }

            if ($total_page > $page_number) {
               echo '<li><a href="shop.php?page=' . ($page_number + 1) . '"><i class="fa-solid fa-chevron-right"></i></a></li>';
            }

            echo "</ul>";
            ?>

         </div>

      </div>

   </section>


   <?php include 'footer.php'; ?>

   <!-- scroll top button  -->
   <a href="#product" class="scroll-top fas fa-angle-up"></a>

   <script src="js/script.js"></script>

</body>

</html>