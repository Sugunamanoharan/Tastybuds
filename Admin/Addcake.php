<?php
require 'config.php'; // Database connection

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cake_name = trim($_POST['cake_name']);
    $price = trim($_POST['price']);

    // Image Upload Handling
    $targetDir = "uploads/"; // Folder to store images

    // Ensure uploads folder exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Check if it's an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        die("Error: File is not a valid image.");
    }

    // Allowed file types
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Error: Only JPG, JPEG, PNG & GIF files are allowed.");
    }

    // Move file to uploads folder
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // Insert into database
        $sql = "INSERT INTO cakes (cake_name, price, image) VALUES ('$cake_name', '$price', '$fileName')";
        if ($conn->query($sql) === TRUE) {
            header("Location: CAKEORDER.php"); // Redirects to cakes page
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Cake</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload Cake Details</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Cake Name</label>
                <input type="text" name="cake_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            <a href="Read cake.php" class="btn btn-success">View Cakes</a>
        </form>
    </div>
</body>
</html>
