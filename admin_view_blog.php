<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blog</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/admin_style.css">


</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="view-blog">

        <?php
        $id = $_GET['id'];
        $select_blogs = $conn->prepare("SELECT * FROM `blog` WHERE id = {$id}");
        $select_blogs->execute();
        while ($fetch_blogs = $select_blogs->fetch(PDO::FETCH_ASSOC)) {

        ?>
            <h1 class="title"><?= $fetch_blogs['advisor_name']; ?> Blogs</h1>
            <a href="admin_update_blog.php?id=<?= $fetch_blogs['id']; ?>" class="btn blog_edit_btn"><i class="fa-solid fa-user-plus"></i> Edit Blog</a>
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
        <a href="admin_blogs.php" class="option-btn">go back</a>

    </section>













    <script src="js/script.js"></script>

</body>

</html>