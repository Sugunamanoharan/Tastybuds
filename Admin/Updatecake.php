<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM cakes WHERE id=$id";
    $result = $conn->query($sql);
    $cake = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $cake_name = $conn->real_escape_string($_POST['cake_name']);
    $price = $conn->real_escape_string($_POST['price']);

    $image = $cake['image']; // Keep old image by default
    if (!empty($_FILES["image"]["name"])) {
        // Upload new image
        $targetDir = "uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
        $image = $fileName;
    }

    $sql = "UPDATE cakes SET cake_name='$cake_name', price='$price', image='$image' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cake updated successfully!'); window.location='cake_list.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Cake</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Cake</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $cake['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Cake Name</label>
                <input type="text" name="cake_name" class="form-control" value="<?php echo $cake['cake_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo $cake['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                <img src="uploads/<?php echo $cake['image']; ?>" width="100" height="100">
            </div>
            <div class="mb-3">
                <label class="form-label">Upload New Image (Optional)</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="cake_list.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
