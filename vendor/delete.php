<?php
    require_once '../config/connect.php'; 
    $task_id = $_GET['id'];
   
    // Request to delete an item in the database
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE `tasks`.`id` = :id ");
    $stmt ->execute([
        ':id' => $task_id,
    ]);

    // Redirect to home
    header('Location: ../index.php');
?>