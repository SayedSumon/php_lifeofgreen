<?php

@include 'config.php';

session_start();

$advisor_id = $_SESSION['advisor_id'];

if (!isset($advisor_id)) {
    header('location:login.php');
};

if (isset($_POST['add_blog'])) {


    $advisor_id = $_POST['advisor_id'];
    $advisor_id = filter_var($advisor_id, FILTER_SANITIZE_STRING);
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);
    $category = $_POST['category'];
    $category = filter_var($category, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    $select = $conn->prepare("SELECT * FROM `blog` WHERE title = ?");
    $select->execute([$title]);

    if ($select->rowCount() > 0) {
        $message[] = 'user title already exist!';
    } else {
        $insert = $conn->prepare("INSERT INTO `blog`(advisor_id, advisor_name, title, description, category, image) VALUES(?,?,?,?,?,?)");
        $insert->execute([$advisor_id, $name, $title, $description, $category, $image]);

        if ($insert) {
            if ($image_size > 2000000) {
                $message[] = 'image size is too large!';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Blog added successfully!';
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
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'advisor_header.php'; ?>

    <section class="add-blog">

        <h1 class="title">Add Blog</h1>

        <form action="" method="POST" enctype="multipart/form-data">

            <div class="inputBox">
                <input type="hidden" name="advisor_id" value="<?= $fetch_profile['id']; ?>" placeholder="advisor id" class="box">
                <input type="hidden" name="name" value="<?= $fetch_profile['name']; ?>" placeholder="advisor name" class="box">
                <span>Title :</span>
                <input type="text" name="title" placeholder="add title" required class="box">
                <span>Description :</span>
                <textarea name="description" placeholder="Write About this topic?" required class="box" rows="4" cols="50"></textarea>
                <span>Category :</span>
                <select name="category" class="box" required>
                    <option value="rooftop">Rooftop garden</option>
                    <option value="business garden">business garden</option>
                    <option value="home garden">Home garden</option>
                    <option value="flower plant">Flower plant</option>
                    <option value="fruit plant">Fruit plant</option>
                    <option value="other">Other</option>
                </select>
                <span>Picture :</span>
                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
            </div>

            <div class="flex-btn">
                <input type="submit" class="btn" value="add blog" name="add_blog">
                <a href="advisor_blogs.php" class="option-btn">go back</a>
            </div>
        </form>

    </section>

    <script src="js/script.js"></script>

</body>

</html>