<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['add_profile'])) {

    
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = md5($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = md5($_POST['confirm_pass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
    $user_type = $_POST['user_types'];
    $user_type = filter_var($user_type, FILTER_SANITIZE_STRING);
    $degree = $_POST['degree'];
    $degree = filter_var($degree, FILTER_SANITIZE_STRING);
    $specialist = $_POST['specialist'];
    $specialist = filter_var($specialist, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select->execute([$email]);

    if ($select->rowCount() > 0) {
        $message[] = 'user email already exist!';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm password not matched!';
        } else {
            $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image, user_type, degree, specialist) VALUES(?,?,?,?,?,?,?)");
            $insert->execute([$name, $email, $pass, $image, $user_type ,$degree, $specialist]);

            if ($insert) {
                if ($image_size > 2000000) {
                    $message[] = 'image size is too large!';
                } else {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'add profile successfully!';
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add user</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/components.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="update-profile">

        <h1 class="title">Add profile</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="flex">
                <div class="inputBox">
                    <span>username :</span>
                    <input type="text" name="name" placeholder="Enter username" required class="box">
                    <span>email :</span>
                    <input type="email" name="email" placeholder="Enter email" required class="box">
                    <span>picture :</span>
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                    <div id="ifYes" style="display: none;">
                        <span>degree :</span>
                        <input type="text" name="degree" placeholder="Advisor degree" class="box">
                        <span>specialist :</span>
                        <input type="text" name="specialist" placeholder="Specialist" class="box">
                    </div>
                </div>
                <div class="inputBox">
                    <span>user type :</span>
                    <select onchange="yesnoCheck(this);" name="user_types" class="box" required>
                        <option value="user">User</option>
                        <option value="advisor">Advisor</option>
                    </select>
                    <span>password :</span>
                    <input type="password" name="pass" placeholder="Enter password" class="box">
                    <span>password :</span>
                    <input type="password" name="confirm_pass" placeholder="Confirm password" class="box">
                </div>
            </div>
            <div class="flex-btn">
                <input type="submit" class="btn" value="add profile" name="add_profile">
                <a href="admin_users.php" class="option-btn">go back</a>
            </div>
        </form>

    </section>

    <script src="js/script.js"></script>

</body>

</html>