<?php

@include 'config.php';

session_start();

$advisor_id = $_SESSION['advisor_id'];

if (!isset($advisor_id)) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>advisor dashboard</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'advisor_header.php'; ?>

    <section class="dashboard">

        <h1 class="title">dashboard</h1>

        <div class="box-container">

            <div class="box">
                <?php
                $select_messages = $conn->prepare("SELECT * FROM `messages` WHERE incoming_msg_id = $advisor_id");
                $select_messages->execute();
                $number_of_messages = $select_messages->rowCount();
                ?>
                <h3><?= $number_of_messages; ?></h3>
                <p>total messages</p>

                <a href="advisor_contacts.php" class="btn">see messages</a>
            </div>
            <div class="box">
                <?php
                $select_blog = $conn->prepare("SELECT * FROM `blog` WHERE advisor_id = {$advisor_id}");
                $select_blog->execute();
                $number_of_blog = $select_blog->rowCount();
                ?>
                <h3><?= $number_of_blog; ?></h3>
                <p>total blog</p>

                <a href="advisor_blogs.php" class="btn">see blogs</a>
            </div>

        </div>

    </section>





    <script src="js/script.js"></script>

</body>

</html>-