<?php 
    require_once '../config/connect.php'; 
   $title = mysqli_real_escape_string($connect, $_POST['title']);
   $description = mysqli_real_escape_string($connect, $_POST['description']);
   $status = isset($_POST['status']) ? 1 : 0;

   // Request to create an item in the database
    mysqli_query($connect, "INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `created_at`) VALUES (NULL, '$title', '$description', '$status', CURRENT_TIMESTAMP)");

    // Redirect to home
    header('Location: ../index.php');