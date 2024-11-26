<?php 
    require_once '../config/connect.php'; 
   $title = $_POST['title'];
   $description = $_POST['description'];
   $status = isset($_POST['status']) ? 1 : 0;

   // Request to create an item in the database
    $stmt = $pdo->prepare("INSERT INTO `tasks` (`title`, `description`, `status`, `created_at`) VALUES (:title, :description, :status, CURRENT_TIMESTAMP)");
    $stmt ->execute([
        ':title' => $title,
        ':description'  => $description,
        ':status'  => $status,
    ]);

    // Redirect to home
    header('Location: ../index.php');