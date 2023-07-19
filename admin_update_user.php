<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};


if (isset($_POST['update_user_profile'])) {


    $user_id = $_POST['user_id'];
    $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $user_type = $_POST['user_types'];
    $user_type = filter_var($user_type, FILTER_SANITIZE_STRING);
    $user_status = $_POST['user_status'];
    $user_status = filter_var($user_status, FILTER_SANITIZE_STRING);
    $degree = $_POST['degree'];
    $degree = filter_var($degree, FILTER_SANITIZE_STRING);
    $specialist = $_POST['specialist'];
    $specialist = filter_var($specialist, FILTER_SANITIZE_STRING);

    $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ?, user_type = ?, degree = ?, specialist = ?, user_status = ? WHERE id = ?");
    $update_profile->execute([$name, $email, $user_type, $degree, $specialist, $user_status, $user_id]);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;
    $old_image = $_POST['old_image'];

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'image size is too large!';
        } else {
            $update_image = $conn->prepare("UPDATE `users` SET image = ? WHERE id = ?");
            $update_image->execute([$image, $user_id]);
            if ($update_image) {
                move_uploaded_file($image_tmp_name, $image_folder);
                unlink('uploaded_img/' . $old_image);
                $message[] = 'image updated successfully!';
            };
        };
    };

    $old_pass = $_POST['old_pass'];
    $update_pass = md5($_POST['update_pass']);
    $update_pass = filter_var($update_pass, FILTER_SANITIZE_STRING);
    $new_pass = md5($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $confirm_pass = md5($_POST['confirm_pass']);
    $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

    if (!empty($update_pass) and !empty($new_pass) and !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'confirm password not matched!';
        } else {
            $update_pass_query = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_pass_query->execute([$confirm_pass, $user_id]);
            $message[] = 'password updated successfully!';
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
    <title>update user profile</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/components.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="update-profile">

        <h1 class="title">update profile</h1>
        <?php
        $user_id = $_GET['edit'];
        $select_users = $conn->prepare("SELECT * FROM `users` WHERE id = {$user_id}");
        $select_users->execute();
        while ($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)) {

        ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="inputBox">
                    <input type="hidden" name="user_id" value="<?= $fetch_users['id']; ?>" placeholder="" class="box">
                </div>
                <img src="uploaded_img/<?= $fetch_users['image']; ?>" alt="">
                <div class="flex">
                    <div class="inputBox">
                        <span>username :</span>
                        <input type="text" name="name" value="<?= $fetch_users['name']; ?>" placeholder="update username" required class="box">
                        <span>email :</span>
                        <input type="email" name="email" value="<?= $fetch_users['email']; ?>" placeholder="update email" required class="box">
                        <span>update pic :</span>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                        <input type="hidden" name="old_image" value="<?= $fetch_users['image']; ?>">
                        <span>user type :</span>
                        <select name="user_types" class="box" value="<?= $fetch_users['user_type']; ?> required">
                            <?php
                            if ($fetch_users['user_type'] == "advisor") {
                                echo "<option value='user'>User</option>";
                                echo "<option value='advisor' selected>Advisor</option>";
                                echo "<option value='admin'>Admin</option>";
                            } elseif ($fetch_users['user_type'] == "admin") {
                                echo "<option value='user'>User</option>";
                                echo "<option value='advisor'>Advisor</option>";
                                echo "<option value='admin' selected>Admin</option>";
                            } else {
                                echo "<option value='user' selected>User</option>";
                                echo "<option value='advisor'>Advisor</option>";
                                echo "<option value='admin'>Admin</option>";
                            }
                            ?>

                        </select>

                        <?php
                        if ($fetch_users['user_type'] == "advisor") {
                        ?>
                            <span>Specialist :</span>
                            <input type="text" name="specialist" value="<?= $fetch_users['specialist'] ?>" placeholder="update specialist" class="box">
                        <?php
                        }else {
                            ?>
                                <input type="hidden" name="specialist" value="null">
                            <?php
                            }
                        ?>
                    </div>
                    <div class="inputBox">
                        <input type="hidden" name="old_pass" value="<?= $fetch_users['password']; ?>">
                        <span>old password :</span>
                        <input type="password" name="update_pass" placeholder="enter previous password" class="box" required>
                        <span>new password :</span>
                        <input type="password" name="new_pass" placeholder="enter new password" class="box">
                        <span>confirm password :</span>
                        <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                        <?php
                        if ($fetch_users['user_type'] == "advisor") {
                        ?>
                            <span>Degree :</span>
                            <input type="text" name="degree" value="<?= $fetch_users['degree'] ?>" placeholder="update degree" class="box">
                        <?php
                        } else {
                        ?>
                            <input type="hidden" name="degree" value="null">
                        <?php
                        }
                        ?>
                        <?php
                        if ($fetch_users['user_type'] == "user") {
                        ?>
                            <span>user status :</span>
                            <select name="user_status" class="box" value="<?= $fetch_users['user_status']; ?> required">
                                <?php
                                if ($fetch_users['user_status'] == "subscriber") {
                                    echo "<option value='not subscriber'>Not subscriber</option>";
                                    echo "<option value='subscriber' selected>subscriber</option>";
                                } else {
                                    echo "<option value='not subscribe' selected>not subscribe</option>";
                                    echo "<option value='subscriber'>subscriber</option>";
                                }
                                ?>

                            </select>
                        <?php
                        } else {
                        ?>
                            <input type="hidden" name="user_status" value="<?= $fetch_users['user_status']; ?>">
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="flex-btn">
                    <input type="submit" class="btn" value="update profile" name="update_user_profile">
                    <a href="admin_users.php" class="option-btn">go back</a>
                </div>
            </form>
        <?php
        }
        ?>

    </section>




    <script src="js/script.js"></script>

</body>

</html>