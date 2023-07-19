<?php
@include 'config.php';

session_start();

$advisor_id = $_SESSION['advisor_id'];

if (!isset($advisor_id)) {
    header('location:login.php');
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with User</title>
    <!-- favicon link -->
    <link rel="shortcut icon" href="images/logo/logo.png" type="image/x-icon">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'advisor_header.php'; ?>
    <section style="display: flex; justify-content: center;">
        <div class="chat-wrapper">
            <div class="chat-area">
                <header>
                    <?php
                    $user_id = $_GET['msg_user_id'];
                    $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                    $select_user->execute([$user_id]);
                    if ($select_user->rowCount() > 0) {
                        $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)
                    ?>
                        <a href="advisor_contacts.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <img src="uploaded_img/<?= $fetch_user['image']; ?>" alt="">
                        <div class="details">
                            <span><?= ucwords($fetch_user['name']); ?></span>
                            <!-- <p><?php echo $row['status']; ?></p> -->
                        </div>
                    <?php
                    } else {
                        header("location: home.php");
                    }
                    ?>
                </header>
                <div class="chat-box">

                </div>
                <form action="#" class="typing-area">
                    <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                    <button><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
    <script src="js/advisor_chat.js"></script>

</body>

</html>