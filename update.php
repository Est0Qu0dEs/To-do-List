<?php 
    require_once 'config/connect.php';
    $task_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE `tasks`. `id` = :id ");
    $stmt ->execute([
        ':id' => $task_id,
    ]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Update</title>
</head>
<body>
    <!-- Form update -->
    <h2>Update task</h2>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($task_id) ?>">
        <p>Title</p>
        <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']) ?>" required>
        <p>Description</p>
        <textarea name="description"><?php echo htmlspecialchars($task['description']) ?></textarea>
        <p>Status</p>
        <input type='checkbox' name="status" <?php echo $task['status'] == 1 ? 'checked' : ''; ?>>
        <button type="submit">Update</button>
    </form>
</body>
</html>