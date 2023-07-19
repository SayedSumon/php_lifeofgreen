<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $user_type = $_POST['user_types'];
   $user_type = filter_var($user_type, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
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
         $insert->execute([$name, $email, $pass, $image, $user_type, $degree, $specialist]);

         if ($insert) {
            if ($image_size > 2000000) {
               $message[] = 'image size is too large!';
            } else {
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'registered successfully!';
               header('location:login.php');
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
   <title>register</title>
   <!-- favicon link -->
   <link rel="shortcut icon" href="images/logo/logo.png" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">

</head>

<body>

   <?php

   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }

   ?>
   <div style="background-image: url('images/bg/banner_reg.jpg'); background-repeat: no-repeat;">
      <section class="form-container">
         <h3>Choose Yourself to Sign Up</h3>

         <form action="" enctype="multipart/form-data" method="POST">
            <div class="chosen-panel">
               <div class="chosen-panel-item">
                  <div class="chosen-panel-img"><img src="images/user.png" alt="user sing img"></div>
                  <div class="chosen-panel-text">
                     <h2>User</h2>
                  </div>
                  <div class="chosen-panel-icon">
                     <input type="radio" name="user_types" onclick="yesCheck(this);" value="user" id="user_login" class="user-login">
                     <span></span>
                  </div>
               </div>
               <div class="chosen-panel-item">
                  <div class="chosen-panel-img"><img src="images/advisor.png" alt="advisor sing img"></div>
                  <div class="chosen-panel-text">
                     <h2>Advisor</h2>
                  </div>
                  <div class="chosen-panel-icon">
                     <input type="radio" name="user_types" onclick="yesCheck(this);" value="advisor" id="advisor_login" class="advisor-login">
                     <span></span>
                  </div>
               </div>
            </div>
            <div class="form-box">
               <div class="user-form">
                  <input type="text" name="name" class="box" placeholder="enter your name" required>
                  <input type="email" name="email" class="box" placeholder="enter your email" required>
                  <input type="password" name="pass" class="box" placeholder="enter your password" required>
                  <input type="password" name="cpass" class="box" placeholder="confirm your password" required>
                  <div id="ifCheck" style="display: none;">
                     <input type="text" name="degree" placeholder="your degree" class="box">
                     <input type="text" name="specialist" placeholder="specialty" class="box">
                  </div>
                  <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
                  <input type="submit" value="register now" class="btn" name="submit">
                  <p>already have an account? <a href="login.php">login now</a></p>
               </div>
            </div>
         </form>

      </section>
   </div>

   <script src="js/script.js"></script>

</body>

</html>