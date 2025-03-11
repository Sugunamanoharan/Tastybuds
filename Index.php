<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
body {
    background: url('Images/Home.jpg') no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    width: 100%;
    margin: 0;
    padding: 0;
}
.navbar {
    background-color: rgba(231,200, 225, 0.8) !important;
}

  </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="#">Tasty Buds</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="Cakes.php">Cakes</a></li>
        <li class="nav-item"><a class="nav-link" href="About Us.php">About Us</a></li>
      </ul>
    </div>
    <div class="navbar-nav ms-auto">
      <a href="Admin login.php" class="nav-item nav-link">Admin</a>
      <a href="Login.php" class="nav-item nav-link">Login</a>
      <a href="Register.php" class="nav-item nav-link">Register</a>
    </div>
  </div>
</nav>

</body>
</html>
