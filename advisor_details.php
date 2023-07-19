<?php

@include 'config.php';

session_start();
session_regenerate_id();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>advisor details</title>

    <!-- favicon link -->
    <link rel="shortcut icon" href="images/logo/logo.png" type="image/x-icon">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="update-profile">

        <h1 class="title">advisor profile</h1>
        <?php
        $user_id = $_GET['advisor_id'];
        $select_users = $conn->prepare("SELECT * FROM `users` WHERE id = {$user_id}");
        $select_users->execute();
        $fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)

        ?>
        <form class="advisor-info">
            <img src="uploaded_img/<?= $fetch_users['image']; ?>" alt="">
            <div class="advisor-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div>
                <p class="name">Name: <?= ucwords($fetch_users['name']);?></p>
                <p class="degree">Degree: <?= $fetch_users['degree']; ?></p>
                <p class="specialist">Specialist: <?= $fetch_users['specialist']; ?></p>
            </div>
        </form>

    </section>


    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>