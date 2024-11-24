<?php 
    require_once 'config/connect.php'; 
    
    // Getting the tasks table from the database
    $stmt = $pdo->query("SELECT * FROM tasks");
    
    // Fetching all tasks as an associative array
    $table = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Filter parameters
    $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
    $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

    // Filter logic
    $filteredTable = array_filter($table, function ($item) use ($statusFilter, $searchQuery) {
        $statusMatch = $statusFilter === '' || $item['status'] == $statusFilter;
        $searchMatch = $searchQuery === '' || stripos($item['title'], $searchQuery) !== false;
        return $statusMatch && $searchMatch;
    });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>To-do List</title>
</head>
<body>
    <!-- Form Filter -->
    <form action="index.php" method="get">
        <select name="status">
            <option value="">All</option>
            <option value="1" <?php echo isset($_GET['status']) && $_GET['status'] == '1' ? 'selected' : ''; ?>>Completed</option>
            <option value="0" <?php echo isset($_GET['status']) && $_GET['status'] == '0' ? 'selected' : ''; ?>>Not Completed</option>
        </select>
        <input type="hidden" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit">Filter</button>
    </form>

    <!-- Form Search -->
    <form action="index.php" method="get">
        <input type="text" name="search" placeholder="Search by title" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? htmlspecialchars($_GET['status']) : ''; ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created at</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <!-- Table output -->
        <?php
            foreach ($filteredTable as $item) {
        ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo htmlspecialchars($item['title']); ?></td>
                    <td><?php echo htmlspecialchars($item['description']); ?></td>
                    <td class="<?php echo $item['status'] == 1 ? 'completed' : 'not-completed'; ?>">
                        <?php 
                            if ($item['status'] == 1) {
                                echo 'Completed';
                            } else {
                                echo 'Not completed';
                            }
                        ?>
                    </td>
                    <td><?php echo $item['created_at']; ?></td>
                    <td><a href="update.php?id=<?php echo $item['id']; ?>">Update</a></td>
                    <td>
                        <a href="vendor/delete.php?id=<?php echo $item['id']; ?>" 
                        onclick="return confirm('Are you sure you want to remove this item?');">
                        Delete
                        </a>
                    </td>
                </tr>
        <?php
            }
        ?>

    </table>
    <!-- Form Add -->
    <h2>Add new task</h2>
    <form action="vendor/create.php" method="post">
        <p>Title</p>
        <input type="text" name="title" required>
        <p>Description</p>
        <textarea name="description"></textarea>
        <p>Status</p>
        <input type='checkbox' name="status">
        <button type="submit">Add</button>
    </form>
</body>
</html>