<?php
require 'config.php';

$sql = "SELECT * FROM cakes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cake List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Available Cakes</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cake Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['cake_name']; ?></td>
                        <td>$<?php echo number_format($row['price'], 2); ?></td>
                        <td><img src="uploads/<?php echo $row['image']; ?>" width="100" height="100"></td>
                        <td>
                            <a href="Updatecake.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="Deletecake.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this cake?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
