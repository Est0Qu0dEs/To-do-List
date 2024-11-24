<?php
try {
    // Connection settings
    $dsn = 'mysql:host=localhost;dbname=To-do List;charset=utf8';
    $username = 'root';
    $password = '';

    // Create a PDO object
    $pdo = new PDO($dsn, $username, $password);

    // Setting the error handling mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully"; // To check that the connection is established
} catch (PDOException $e) {
    // Handling a connection error
    die("Connection failed: " . $e->getMessage());
}
?>