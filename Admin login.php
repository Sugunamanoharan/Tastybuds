<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Login Page</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #e3f2fd;;
            font-family: 'Roboto', sans-serif;
        }
        .login-container {
            width: 350px;
            background: #fff;
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
            background:  #e3f2fd;;
            border: none;
        }
        .form-control {
            border-left: none;
            width: 100%;
        }
        .btn-login {
            width: 100%;
            background-color:  #e3f2fd;;
        }
        .btn-login:hover {
            background-color:rgb(180, 210, 231);;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="" onsubmit="return validateForm()" method="POST">
            
            <!-- Username Field -->
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control" id="name" name="username" placeholder="Username" >
            </div>

            <!-- Password Field -->
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-login">Login</button>
            

        </form>
    </div>

    <!-- Load JavaScript at the end -->
    
 <script>
    
    document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Loaded!"); // Debugging line

    document.querySelector("form").addEventListener("submit", function (event) {
        console.log("Form submitted!"); // Debugging line

        if (!validateForm()) {
            console.log("Validation failed!"); // Debugging line
            event.preventDefault(); // Prevent form submission
        } else {
            console.log("Validation passed!"); // Debugging line
            alert("✅ Login Successful! Redirecting to Login page...");

            // 🔹 Delay redirection so user sees the success message
            setTimeout(function () {
                window.location.href = "Admin/Dashboard.php"; // Ensure this path is correct
            }, 1500);

            // Prevent actual form submission
            event.preventDefault();
        }
    });
});



function validateForm() {
    var name = document.getElementById("name").value.trim();
    var password = document.getElementById("password").value.trim();

    console.log("Username:", name); // Debugging line
    console.log("Password:", password); // Debugging line

    // Check if fields are empty
    if (name === "" || password === "") {
        alert("❌ Enter your username and password");
        return false;
    }

    // Check if credentials are correct
    if (name === "suguna" && password === "54321") {
        console.log("✅ Credentials matched");
        return true;
    } else {
        alert("❌ Incorrect username or password");
        return false;
    }
}


</script>


</body>
</html>
