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
    <title>Blog</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="view-blog">

        <?php
        $id = $_GET['id'];
        $select_blogs = $conn->prepare("SELECT * FROM `blog` WHERE id = {$id}");
        $select_blogs->execute();
        while ($fetch_blogs = $select_blogs->fetch(PDO::FETCH_ASSOC)) {

        ?>
            <h1 class="title"><?= $fetch_blogs['advisor_name']; ?> Blogs</h1>
            <div class="blog-container">
                <h2 class="title"><?= $fetch_blogs['title']; ?></h2>
                <div class="blog_image"><img src="uploaded_img/<?= $fetch_blogs["image"]; ?>" alt=""></div>
                <div class="description">
                    <p><?= $fetch_blogs['description']; ?></p>
                </div>
                <div class="author">
                    <p><?= $fetch_blogs['advisor_name']; ?></p>
                </div>

            </div>
        <?php
        }
        ?>
        <a href="blog.php" class="option-btn">go back</a>

    </section>













    <script src="js/script.js"></script>

</body>

</html>