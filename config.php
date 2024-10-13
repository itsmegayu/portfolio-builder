<?php
// Database connection settings
$DB_HOST = 'localhost'; // Typically localhost for XAMPP
$DB_USERNAME = 'root';  // Default username for XAMPP
$DB_PASSWORD = '';      // Default password is empty for XAMPP
$DB_DATABASE = 'portfolio_builder'; // Replace with your actual database name

// Create a connection
$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
