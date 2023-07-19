<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
};

if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_blogs = $conn->prepare("DELETE FROM `blog` WHERE id = ?");
   $delete_blogs->execute([$delete_id]);
   header('location:admin_blogs.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>blogs</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="user-accounts">

      <h1 class="title">Blogs</h1>
      <a href="admin_add_blog.php" class="btn add_user"><i class="fa-solid fa-user-plus"></i> Add Blog</a>
      <div class="table-content">
         <table>
            <thead>
               <th>SL.No</th>
               <th>Advisor ID</th>
               <th>Advisor Name</th>
               <th>Title</th>
               <th>category</th>
               <th>view</th>
               <th>Delete</th>
            </thead>
            <tbody>
               <?php
               $serial_no = 1;
               $limit = 3;
               if(isset($_GET['page'])){
                  $page_number = $_GET['page'];
               }
               else{
                  $page_number = 1;
               }
               $offset = ($page_number - 1) * $limit;
               $select_blogs = $conn->prepare("SELECT * FROM `blog` ORDER BY id DESC LIMIT {$offset}, {$limit}");
               $select_blogs->execute();
               while ($fetch_blogs = $select_blogs->fetch(PDO::FETCH_ASSOC)) {
               ?>

                  <tr>
                     <td><?= $serial_no++; ?></td>
                     <td><?= $fetch_blogs['advisor_id']; ?></td>
                     <td><?= $fetch_blogs['advisor_name']; ?></td>
                     <td><?= $fetch_blogs['title']; ?></td>
                     <td><?= $fetch_blogs['category']; ?></td>
    
                     <td><a href="admin_view_blog.php?id=<?= $fetch_blogs['id']; ?>" class="view_btn"><i class="fa-solid fa-eye"></i></a></td>
                     <td><a href="admin_blogs.php?delete=<?= $fetch_blogs['id']; ?>" onclick="return confirm('delete this blog?');" class="delete_btn"><i class="fa-solid fa-trash"></i></a></td>
                  </tr>

               <?php
               }
               ?>
            </tbody>
         </table>

         <?php
         $select_blogs = $conn->prepare("SELECT * FROM `blog`");
         $select_blogs->execute();
         $number_of_blogs = $select_blogs->rowCount();
         $total_page = ceil($number_of_blogs/$limit);
               echo "<ul class='pagination admin-pagination'>";

               if($page_number > 1){
                  echo '<li><a href="admin_blogs.php?page='.($page_number-1).'"><i class="fa-solid fa-chevron-left"></i></a></li>';
               }

               for($i=1; $i<=$total_page; $i++){
                  if($i == $page_number){
                     $active = "active";
                  }
                  else{
                     $active = "";
                  }
                  echo '<li class='.$active.'><a href="admin_blogs.php?page='.$i.'">'.$i.'</a></li>';
               }

               if($total_page > $page_number){
                  echo '<li><a href="admin_blogs.php?page='.($page_number+1).'"><i class="fa-solid fa-chevron-right"></i></a></li>';
               }

               echo "</ul>";
         ?>

      </div>

   </section>

   <script src="js/script.js"></script>

</body>

</html>