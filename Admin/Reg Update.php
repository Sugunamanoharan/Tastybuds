<?php
include 'Admin/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM register WHERE id = $id");
    $user = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("sssi", $username, $email, $phone, $id);

    if ($stmt->execute()) {
        header("Location: Reg Read.php");
        exit();
    } else {
        die("❌ Error: " . $stmt->error);
    }
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
    background: White; 
    padding: 20px; 
    margin: 100px auto; 
    border-radius: 10px; 
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
 }

.login-container h2 { 
    text-align: center; 
    margin-bottom: 20px; 
}
.input-group { 
    margin-bottom: 15px; 
}
.input-group-text { 
    background: rgb(231, 200, 225); 
    border: none; 
}
.form-control {
     border-left: none; 
    }
.btn-login { 
    width: 100%; 
    background-color: rgb(231, 200, 225);
 }
.btn-login:hover { 
    background-color: rgb(227, 153, 212); 
}
.link{
   text-align:center;
   
}
    </style>
</head>
<body>
<div class="login-container">
    <h2>Register</h2>
    <form action="Reg Update.php" method="POST" >
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user['username']; ?>" required>
        </div>
        
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"value="<?php echo $user['email']; ?>" required>
        </div>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Create Password" required>
        </div>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $user['phone']; ?>" required>
        </div>
        <button type="submit" class="btn btn-login">Update</button>
    
    </form>
</div>
</div>
  
</body>
</html>
