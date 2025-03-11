<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM Bookingdetails WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: Order Read.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete User</title>
</head>
<body>
    <a href="Order Read.php">Back to User List</a>
</body>
</html>
