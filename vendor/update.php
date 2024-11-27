<?php
    require_once '../config/connect.php'; 
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? 1 : 0;
    $id = $_POST['id'];
   
    // Request to update an item in the database
    $stmt = $pdo->prepare("UPDATE `tasks` SET `title` = :title, `description` = :description, `status` = :status WHERE `tasks`.`id` = :id ");
    $stmt ->execute([
        ':id' => $id,
        ':title' => $title,
        ':description'  => $description,
        ':status'  => $status,
    ]);
    // Redirect to home
    header('Location: ../index.php');
?>
