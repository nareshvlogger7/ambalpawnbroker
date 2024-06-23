<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next Page</title>
</head>
<body>
    <p>You are logged in!</p>
    <a href="index.html">INDEX</a>
</body>
</html>
