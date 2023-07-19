<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
};

if (isset($_POST['subscribe'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $placed_on = date('d-M-Y');

    $uptodate = $_POST['date'];
    $uptodate = filter_var($uptodate, FILTER_SANITIZE_STRING);


    if ($uptodate == '7 day') {
        $strtodate = strtotime("+7 Days");
        $place_upto = date('d-M-Y', $strtodate);
    } elseif ($uptodate == '6 month') {
        $strtodate = strtotime("+6 Months");
        $place_upto = date('d-M-Y', $strtodate);
    } elseif ($uptodate == '1 year') {
        $strtodate = strtotime("+1 Years");
        $place_upto = date('d-M-Y', $strtodate);
    }

    $total_amount = $_POST['amount'];
    $total_amount = filter_var($total_amount, FILTER_SANITIZE_STRING);

    $select_service = $conn->prepare("SELECT * FROM `service` WHERE user_name = ? AND email = ? AND amount = ? AND place_on = ? AND place_upto = ?");
    $select_service->execute([$name, $email, $total_amount, $placed_on, $place_upto]);

    if ($select_service->rowCount() > 0) {
        $message[] = 'already subscribe';
    } else {

        $insert_subscriber = $conn->prepare("INSERT INTO `service`(user_id, user_name, email, amount, place_on, place_upto) VALUES(?,?,?,?,?,?)");
        $insert_subscriber->execute([$user_id, $name, $email, $total_amount, $placed_on, $place_upto]);
        header('location:subscriptionPayment.php?price=' . $total_amount . '&name=' . $name);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe</title>
    <!-- favicon link -->
    <link rel="shortcut icon" href="images/logo/logo.png" type="image/x-icon">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section>

        <h1 class="title">Choose your package</h1>

        <div class="subscription_package">
            <div class="package">
                <h5 class="package_plan">Free for 7 day</h5>
                <h1>৳ 0</h1>
                <ul>
                    <li><i class="fa-sharp fa-solid fa-square-check"></i>contact with any advisor</li>
                </ul>
                <h5>committing to 7 day</h5>
                <?php
                $users = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $users->execute([$user_id]);
                $fetch_user = $users->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="name" value="<?= ($fetch_user['name']) ?>">
                    <input type="hidden" name="email" value="<?= ($fetch_user['email']) ?>">
                    <input type="hidden" name="amount" value="1">
                    <input type="hidden" name="date" value="7 day">
                    <input type="submit" value="subscribe" class="btn subscribe_btn1" name="subscribe">
                </form>
            </div>

            <div class="package">
                <h5 class="package_plan">6 Month Plan</h5>
                <h1>৳ 1500</h1>
                <ul>
                    <li><i class="fa-sharp fa-solid fa-square-check"></i>contact with any advisor</li>
                    <li><i class="fa-sharp fa-solid fa-square-check"></i>get live session with advisor</li>
                </ul>
                <h5>committing to 6 Month</h5>
                <?php
                $users = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $users->execute([$user_id]);
                $fetch_user = $users->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="name" value="<?= ($fetch_user['name']) ?>">
                    <input type="hidden" name="email" value="<?= ($fetch_user['email']) ?>">
                    <input type="hidden" name="amount" value="1500">
                    <input type="hidden" name="date" value="6 month">
                    <input type="submit" value="subscribe" class="btn subscribe_btn2" name="subscribe">
                </form>
            </div>

            <div class="package">
                <h5 class="package_plan">1 Year Plan</h5>
                <h1>৳ 5000</h1>
                <ul>
                    <li><i class="fa-sharp fa-solid fa-square-check"></i>contact with any advisor</li>
                    <li><i class="fa-sharp fa-solid fa-square-check"></i>get live session with advisor</li>
                    <li><i class="fa-sharp fa-solid fa-square-check"></i>Garden inspection 1day per month</li>
                </ul>
                <h5>committing to 1 year</h5>
                <?php
                $users = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $users->execute([$user_id]);
                $fetch_user = $users->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="name" value="<?= ($fetch_user['name']) ?>">
                    <input type="hidden" name="email" value="<?= ($fetch_user['email']) ?>">
                    <input type="hidden" name="amount" value="5000">
                    <input type="hidden" name="date" value="1 year">
                    <input type="submit" value="subscribe" class="btn subscribe_btn" name="subscribe">
                </form>
            </div>
        </div>




    </section>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>