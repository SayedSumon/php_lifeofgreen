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
    <title>service</title>

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

    <!-- subscription banner -->
    <?php
    $users = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $users->execute([$user_id]);
    $fetch_subscriber = $users->fetch(PDO::FETCH_ASSOC);
    ?>
    <Section class="subscription" style=" display:<?php if ($fetch_subscriber['user_status'] == 'subscriber') {
                                                        echo 'none';
                                                    } else {
                                                        echo 'block';
                                                    }; ?>">
        <div class="subscription-content">
            <div class="box" style="background: url(images/bg/banner4.jpg);">
                <div class="content">
                    <h2>Get Subscription Now</h2>
                    <h3>get touch with our advisor and get monthly package for our services.</h3>
                    <a href="subscription_package.php" class="btn">Subscribe Now <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </Section>

    <!-- advisor list -->
    <section class="advisor-list" id="advisor-list">
        <h1 class="title">Advisor List</h1>

        <div class="advisor-container">

            <?php
            $select_users = $conn->prepare("SELECT * FROM `users` WHERE user_type ='advisor'");
            $select_users->execute();
            while ($fetch_advisor = $select_users->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="box">

                    <img src="uploaded_img/<?= $fetch_advisor['image']; ?>" alt="">

                    <div class="advisor-info">
                        <p class="name"><span style=" color:<?php if ($fetch_advisor['name']) {
                                                                echo 'green';
                                                            }; ?>"><?= ucwords($fetch_advisor['name']); ?></span></p>
                        <p class="degree"><?= ucwords($fetch_advisor['degree']); ?></span></p>
                        <p class="specialist">Specialist: <span style=" color:<?php if ($fetch_advisor['specialist']) {
                                                                                    echo 'red';
                                                                                }; ?>"><?= $fetch_advisor['specialist']; ?></p>

                        <div class="advisor-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <div class="advisor-details">
                            <a href="advisor_details.php?advisor_id=<?= ($fetch_advisor['id']) ?>" class="details btn">See Details</a>
                            <?php
                            $users = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                            $users->execute([$user_id]);
                            $fetch_subscriber = $users->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <a href="message_view.php?advisor_id=<?= ($fetch_advisor['id']) ?>" class="advisor-message btn <?= ($fetch_subscriber['user_status'] == 'subscriber') ? '' : 'disabled'; ?>">Message</a>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>
        </div>
    </section>


    <?php include 'footer.php'; ?>

    <!-- scroll top button  -->
    <a href="#advisor-list" class="scroll-top fas fa-angle-up"></a>

    <script src="js/script.js"></script>

</body>

</html>