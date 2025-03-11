<?php
include 'Admin/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($username) || empty($password)) {
        die("❌ Username and Password are required!");
    }

    // Prepare SQL to check credentials
    $stmt = $conn->prepare("SELECT id, password FROM register WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;
            header("Location: Home.php"); // Redirect to dashboard or home page
            exit();
        } 
    $stmt->close();
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: 'Roboto', sans-serif; background-color: rgb(237, 188, 214); }
        .login-container { width: 350px; background: white; padding: 20px; margin: 100px auto; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        .login-container h2 { text-align: center; margin-bottom: 20px; }
        .input-group { margin-bottom: 15px; }
        .input-group-text { background: rgb(237, 200, 225); border: none; }
        .form-control { border-left: none; width: 100%; }
        .btn-login { width: 100%; background-color: rgb(231, 200, 225); }
        .btn-login:hover { background-color: rgb(227, 153, 212); }
        .link { text-align: center; }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
            <div class="link">
                <a href="Register.php">Create New Account</a>
            </div>
        </form>
    </div>
    <script src="JS/Login.js"></script>
</body>
</html>
