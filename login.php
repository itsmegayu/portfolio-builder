<?php
session_start();
include 'config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redirect to your dashboard or protected area
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "No user found with that username. Please sign up.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css"> <!-- Link to the CSS file -->
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="index.html" method="POST">
                <div class="user-box">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="login-button">Login</button>
                <p class="signup-link">Don't have an account? <a href="signup.html">Sign up</a></p>
            </form>
        </div>
    </div>
</body>
</html>
/* Body background */
<style>

body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #181818;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Container styling */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box {
    background: #333;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    text-align: center;
    color: #fff;
}

/* Heading style */
.login-box h2 {
    margin-bottom: 30px;
    font-size: 24px;
    color: #fff;
}

/* Input fields styling */
.user-box {
    position: relative;
    margin-bottom: 30px;
}

.user-box input {
    width: 100%;
    padding: 10px 0;
    background: transparent;
    border: none;
    border-bottom: 2px solid #fff;
    outline: none;
    color: #fff;
    font-size: 16px;
}

.user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #fff;
}

.user-box input:focus ~ label,
.user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #00b4d8;
    font-size: 12px;
}

.login-button {
    background-color: #00b4d8;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 100%;
}

.login-button:hover {
    background-color: #0077b6;
}

.signup-link {
    margin-top: 20px;
    color: #fff;
}

.signup-link a {
    color: #00b4d8;
    text-decoration: none;
}
</style>