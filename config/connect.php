<?php
try {
    // Connection settings
    $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=To-do List;charset=utf8';
    $username = 'root';
    $password = '';

    // Create a PDO object
    $pdo = new PDO($dsn, $username, $password);

    // Setting the error handling mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
    // Handling a connection error
    die("Connection failed: " . $exception->getMessage());
}
?>