


<?php
// Include the configuration file
include 'config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    // Validate email and phone number
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    if (!preg_match("/^\d{10}$/", $phone)) {
        die("Invalid phone number format.");
    }

    // Check if any field is empty
    if (empty($username) || empty($email) || empty($password) || empty($phone)) {
        die("All fields are required.");
    }

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO register (username, email, password, phone) VALUES (?, ?, ?, ?)");

    // Check for errors
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $phone);

    // Execute the query and check for errors
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    } else {
        echo "Registration successful!";
        // Redirect to login page
        header("Location: Reg Read.php");
        exit;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: rgb(237, 188, 214);
            width: 100%;
        }
        .login-container { 
            width: 350px; 
            background: white;
            padding: 20px; 
            margin: 100px auto; 
            border-radius: 10px; 
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 { text-align: center; margin-bottom: 20px; }
        .input-group { margin-bottom: 15px; }
        .input-group-text { background: rgb(231, 200, 225); border: none; }
        .form-control { border-left: none; }
        .btn-login { width: 100%; background-color: rgb(231, 200, 225); }
        .btn-login:hover { background-color: rgb(227, 153, 212); }
        .link { text-align:center; }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Create Register</h2>
    <form action="Create Register.php" method="POST">
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Create Password" required>
        </div>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
        </div>
        <button type="submit" class="btn btn-login">Register</button>
        <div class="link"><a href="Login.php">Already have an account? Login</a></div>
    </form>
</div>
</body>
</html>
