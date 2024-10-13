<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Your protected content here
?>
