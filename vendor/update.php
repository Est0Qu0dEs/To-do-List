<?php
    require_once '../config/connect.php'; 
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $status = isset($_POST['status']) ? 1 : 0;
    $id = mysqli_real_escape_string($connect, $_POST['id']);
   
    // Request to update an item in the database
    mysqli_query($connect, "UPDATE `tasks` SET `title` = '$title', `description` = '$description', `status` = '$status' WHERE `tasks`.`id` = '$id' ");

    // Redirect to home
    header('Location: ../index.php');
?>
