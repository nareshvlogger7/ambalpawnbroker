<?php
$servername = "localhost";
$username = "root";
$password = ""; // leave blank if using default XAMPP settings
$dbname = "ambal_jewellery_db"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
