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
    <!-- favicon link -->
    <link rel="shortcut icon" href="images/logo/logo.png" type="image/x-icon">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="">

        <h1 class="title" id="title">Blogs</h1>

        <div class="blog-container">
            <div class="blogs">
                <?php
                $limit = 3;
                if (isset($_GET['page'])) {
                    $page_number = $_GET['page'];
                } else {
                    $page_number = 1;
                }
                $author_name = $_GET['author'];
                $offset = ($page_number - 1) * $limit;
                $select_blogs = $conn->prepare("SELECT * FROM `blog` WHERE advisor_name = ? LIMIT {$offset}, {$limit}");
                $select_blogs->execute([$author_name]);
                if ($select_blogs->rowCount() > 0) {
                    while ($fetch_blogs = $select_blogs->fetch(PDO::FETCH_ASSOC)) {
                ?>


                        <div class="blog">
                            <div class="blog_thumb"><img src="uploaded_img/<?= $fetch_blogs["image"]; ?>" alt=""></div>
                            <div class="blog_detail">
                                <div class="title"><?= $fetch_blogs['title']; ?></div>
                                <div class="flex">
                                    <div class="category"><a href="category_blog.php?category=<?= $fetch_blogs['category']; ?>"><i class="fa-solid fa-book-bookmark"></i> <?= $fetch_blogs['category']; ?></a></div>

                                    <div class="author"><a href="author_blog.php?author=<?= $fetch_blogs['advisor_name']; ?>"><i class="fa-solid fa-pen"></i> <?= $fetch_blogs['advisor_name']; ?></a></div>
                                </div>
                                <div class="description">
                                    <?= substr($fetch_blogs['description'], 0, 300) . "..." ?>
                                </div>
                                <a href="view_blog.php?id=<?= $fetch_blogs['id']; ?>" class="btn read_btn">Read more</a>
                            </div>
                        </div>


                <?php
                    }
                } else {
                    echo '<p class="empty">no blog added yet!</p>';
                }
                ?>
            </div>

            <div class="blog_sidebar">
                <div class="blog_search">

                    <form action="search_blog.php" method="GET">
                        <input type="text" name="search_box" placeholder="search products..." class="box">
                        <input type="submit" value="search" name="search_btn" class="search_btn btn">
                    </form>

                </div>
                <div class="blog_category_dropdown" style="float:right;">
                    <button class="drop_btn">Select Category <i class="fa-solid fa-sort"></i></button>
                    <div class="dropdown-content">
                        <a href="category_blog.php?category=rooftop">Rooftop garden</a>
                        <a href="category_blog.php?category=business garden">Business garden</a>
                        <a href="category_blog.php?category=home garden">Home garden</a>
                        <a href="category_blog.php?category=flower plant">Flower plant</a>
                        <a href="category_blog.php?category=fruit plant">Fruit plant</a>
                        <a href="category_blog.php?category=other">Other</a>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <?php
    $select_blogs = $conn->prepare("SELECT * FROM `blog` WHERE advisor_name = ?");
    $select_blogs->execute([$author_name]);
    $number_of_blogs = $select_blogs->rowCount();
    $total_page = ceil($number_of_blogs / $limit);
    echo "<section><ul class='pagination blog-pagination'>";

    if ($page_number > 1) {
        echo '<li><a href="author_blog.php?author='.$author_name.'&page=' . ($page_number - 1) . '"><i class="fa-solid fa-chevron-left"></i></a></li>';
    }

    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page_number) {
            $active = "active";
        } else {
            $active = "";
        }
        echo '<li class=' . $active . '><a href="author_blog.php?author='.$author_name.'&page=' . $i . '">' . $i . '</a></li>';
    }

    if ($total_page > $page_number) {
        echo '<li><a href="author_blog.php?author='.$author_name.'&page=' . ($page_number + 1) . '"><i class="fa-solid fa-chevron-right"></i></a></li>';
    }

    echo "</section></ul>";
    ?>






    <?php include 'footer.php'; ?>

    <!-- scroll top button  -->
    <a href="title" class="scroll-top fas fa-angle-up"></a>
    <script src="js/script.js"></script>

</body>

</html>