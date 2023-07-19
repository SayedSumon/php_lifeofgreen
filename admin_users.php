<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
};

if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_users = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete_users->execute([$delete_id]);
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="user-accounts">

      <h1 class="title">user accounts</h1>
      <a href="admin_add_user.php" class="btn add_user"><i class="fa-solid fa-user-plus"></i> Add User</a>
      <div class="table-content">
         <table>
            <thead>
               <th>ID.No</th>
               <th></th>
               <th>User Name</th>
               <th>Email</th>
               <th>User Type</th>
               <th>User Status</th>
               <th>Edit</th>
               <th>Delete</th>
            </thead>
            <tbody>
               <?php
               $limit = 3;
               if(isset($_GET['page'])){
                  $page_number = $_GET['page'];
               }
               else{
                  $page_number = 1;
               }
               $offset = ($page_number -1) * $limit;
               $select_users = $conn->prepare("SELECT * FROM `users` ORDER BY id DESC LIMIT {$offset}, {$limit}");
               $select_users->execute();
               while ($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)) {
               ?>

                  <tr>
                     <td><?= $fetch_users['id']; ?></td>
                     <td><img src="uploaded_img/<?= $fetch_users['image']; ?>" alt=""></td>
                     <td><?= $fetch_users['name']; ?></td>
                     <td><?= $fetch_users['email']; ?></td>
                     <td><span style=" color:<?php if ($fetch_users['user_type'] == 'admin') {
                                                echo 'red';
                                             } elseif ($fetch_users['user_type'] == 'advisor') {
                                                echo 'green';
                                             }; ?>"><?= $fetch_users['user_type']; ?></span></td>
                     <td><?= $fetch_users['user_status']; ?></td>
                     <td><a href="admin_update_user.php?edit=<?= $fetch_users['id']; ?>" class="edit_btn"><i class="fa-solid fa-pen-to-square"></i></a></td>
                     <td><a href="admin_users.php?delete=<?= $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete_btn"><i class="fa-solid fa-trash"></i></a></td>
                  </tr>

               <?php
               }
               ?>
            </tbody>
         </table>

         <?php
         $select_accounts = $conn->prepare("SELECT * FROM `users`");
         $select_accounts->execute();
         $number_of_accounts = $select_accounts->rowCount();
         $total_page = ceil($number_of_accounts/$limit);
               echo "<ul class='pagination admin-pagination'>";

               if($page_number >= 1){
                  echo '<li><a href="admin_users.php?page='.($page_number-1).'"><i class="fa-solid fa-chevron-left"></i></a></li>';
               }

               for($i=1; $i<=$total_page; $i++){
                  if($i == $page_number){
                     $active = "active";
                  }
                  else{
                     $active = "";
                  }
                  echo '<li class='.$active.'><a href="admin_users.php?page='.$i.'">'.$i.'</a></li>';
               }

               if($total_page > $page_number){
                  echo '<li><a href="admin_users.php?page='.($page_number+1).'"><i class="fa-solid fa-chevron-right"></i></a></li>';
               }

               echo "</ul>";
         ?>

      </div>

   </section>

   <script src="js/script.js"></script>

</body>

</html>