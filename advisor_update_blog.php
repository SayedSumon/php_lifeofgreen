<?php

@include 'config.php';

session_start();

$advisor_id = $_SESSION['advisor_id'];

if (!isset($advisor_id)) {
    header('location:login.php');
};

if (isset($_POST['update_blog'])) {

    $id = $_POST['blog_id'];
    $id = filter_var($id, FILTER_SANITIZE_STRING);
    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);
    $category = $_POST['category'];
    $category = filter_var($category, FILTER_SANITIZE_STRING);

    $update_blog = $conn->prepare("UPDATE `blog` SET title = ?, description = ?, category = ? WHERE id = ?");
    $update_blog->execute([$title, $description, $category, $id]);

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
            $update_image = $conn->prepare("UPDATE `blog` SET image = ? WHERE id = ?");
            $update_image->execute([$image, $id]);
            if ($update_image) {
                move_uploaded_file($image_tmp_name, $image_folder);
                unlink('uploaded_img/' . $old_image);
                $message[] = 'image updated successfully!';
            };
        };
    } else {
        $message[] = 'Edit blog successfully!';
    };
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'advisor_header.php'; ?>

    <section class="add-blog">

        <h1 class="title">Edit Blog</h1>

        <?php

        $blog_id = $_GET['id'];
        $select_blogs = $conn->prepare("SELECT * FROM `blog` WHERE id = {$blog_id}");
        $select_blogs->execute();
        while ($fetch_blogs = $select_blogs->fetch(PDO::FETCH_ASSOC)) {

        ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="inputBox">
                    <input type="hidden" name="blog_id" value="<?= $fetch_blogs['id']; ?>" placeholder="Blog id" class="box">
                    <img src="uploaded_img/<?= $fetch_blogs['image']; ?>" alt="">
                    <span>Title :</span>
                    <input type="text" name="title" value="<?= $fetch_blogs['title']; ?>" placeholder="edit title" required class="box">
                    <span>Description :</span>
                    <textarea name="description" placeholder="edit topic?" class="box" rows="4" cols="50"><?= $fetch_blogs['description']; ?></textarea>
                    <span>Category :</span>
                    <select name="category" class="box" value="<?= $fetch_blogs['category']; ?>" required>
                        <?php
                        if ($fetch_blogs['category'] == "rooftop") {
                            echo "<option value='rooftop' selected>Rooftop garden</option>";
                            echo "<option value='business garden'>business garden</option>";
                            echo "<option value='home garden'>Home garden</option>";
                            echo "<option value='flower plant'>Flower plant</option>";
                            echo "<option value='fruit plant'>Fruit plant</option>";
                            echo "<option value='other'>Other</option>";
                        } elseif ($fetch_blogs['category'] == "business garden") {
                            echo "<option value='rooftop'>Rooftop garden</option>";
                            echo "<option value='business garden' selected>business garden</option>";
                            echo "<option value='home garden'>Home garden</option>";
                            echo "<option value='flower plant'>Flower plant</option>";
                            echo "<option value='fruit plant'>Fruit plant</option>";
                            echo "<option value='other'>Other</option>";
                        } elseif ($fetch_blogs['category'] == "home garden") {
                            echo "<option value='rooftop'>Rooftop garden</option>";
                            echo "<option value='business garden'>business garden</option>";
                            echo "<option value='home garden' selected>Home garden</option>";
                            echo "<option value='flower plant'>Flower plant</option>";
                            echo "<option value='fruit plant'>Fruit plant</option>";
                            echo "<option value='other'>Other</option>";
                        } elseif ($fetch_blogs['category'] == "flower plan") {
                            echo "<option value='rooftop'>Rooftop garden</option>";
                            echo "<option value='business garden'>business garden</option>";
                            echo "<option value='home garden'>Home garden</option>";
                            echo "<option value='flower plant' selected>Flower plant</option>";
                            echo "<option value='fruit plant'>Fruit plant</option>";
                            echo "<option value='other'>Other</option>";
                        } elseif ($fetch_blogs['category'] == "fruit plant") {
                            echo "<option value='rooftop'>Rooftop garden</option>";
                            echo "<option value='business garden'>business garden</option>";
                            echo "<option value='home garden'>Home garden</option>";
                            echo "<option value='flower plant'>Flower plant</option>";
                            echo "<option value='fruit plant' selected>Fruit plant</option>";
                            echo "<option value='other'>Other</option>";
                        } else {
                            echo "<option value='rooftop'>Rooftop garden</option>";
                            echo "<option value='business garden'>business garden</option>";
                            echo "<option value='home garden'>Home garden</option>";
                            echo "<option value='flower plant'>Flower plant</option>";
                            echo "<option value='fruit plant'>Fruit plant</option>";
                            echo "<option value='other' selected>Other</option>";
                        }
                        ?>
                    </select>
                    <span>Picture :</span>
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                    <input type="hidden" name="old_image" value="<?= $fetch_blogs['image']; ?>">
                </div>
                <div class="flex-btn">
                    <input type="submit" class="btn" value="edit blog" name="update_blog">
                    <a href="advisor_blogs.php" class="option-btn">go back</a>
                </div>
            </form>

        <?php
        }
        ?>

    </section>



    <script src="js/script.js"></script>

</body>

</html>