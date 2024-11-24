<?php
    require_once '../config/connect.php'; 
    $task_id = $_GET['id'];
   
    // Request to delete an item in the database
    mysqli_query($connect, "DELETE FROM tasks WHERE `tasks`.`id` = '$task_id' ");

    // Redirect to home
    header('Location: ../index.php');
?>